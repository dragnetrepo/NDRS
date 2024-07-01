<?php

namespace App\Http\Controllers\Api\Case;

use App\Http\Controllers\Controller;
use App\Models\CaseDiscussion;
use App\Models\CaseDiscussionAction;
use App\Models\CaseDiscussionMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = [
            'status' => Response::HTTP_FORBIDDEN,
            'message' => 'We could not complete your request. Please try again!',
            'error' => []
        ];
    }

    public function index($case_id = 0)
    {
        $data = [];
        $this->response["message"] = "No data found";
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;

        $group_discussions = CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            })->orWhereHas('dispute', function($sub_query) use ($user_id) {
                $sub_query->where("created_by", $user_id);
            });
        })
        ->when($case_id, function($query) use ($case_id) {
            $query->where("case_id", $case_id);
        });

        $private_discussions = CaseDiscussion::when($admin_user, function($query) use ($user_id) {
            $query->where("sender_id", $user_id);
        })
        ->when(!$admin_user, function($query) use ($user_id) {
            $query->where("receiver_id", $user_id);
        })
        ->when($case_id, function($query) use ($case_id) {
            $query->where("case_id", $case_id);
        });

        $discussions = $group_discussions->union($private_discussions)->get();

        if ($discussions->isNotEmpty()) {
            foreach ($discussions as $discussion) {
                $last_msg = $discussion->messages->last();

                $message_content = $last_msg ? $last_msg->content : "";
                $sender_info = [];

                if ($last_msg && $last_msg->message_type == "scheduler") {
                    $message_content = "- Scheduled Meeting";
                }
                elseif ($last_msg && $last_msg->message_type == "poll") {
                    $message_content = "- Poll voting";
                }
                elseif ($last_msg && $last_msg->message_type == "file") {
                    $message_content = "- Document";
                }
                elseif ($last_msg && $last_msg->message_type == "status update") {
                    $message_content = "- Updated dispute status";
                }

                $user = $last_msg->user ?? null;
                if ($discussion->case_id) {
                    $sender_info = [
                        "sender" => trim($user ? ($user->first_name.' '.$user->last_name) : ""),
                        "photo" => get_model_file_from_disk($discussion->dispute->union_data->logo, "union_logos"),
                    ];
                }
                elseif ($last_msg) {
                    if ($user) {
                        if ($user->id == $user_id) {
                            $sender_info = [
                                "sender" => "You",
                                "photo" => get_model_file_from_disk($user->display_picture, "profile_photos"),
                            ];
                        }
                        else {
                            $sender_info = [
                                "sender" => trim($user->first_name.' '.$user->last_name),
                                "photo" => get_model_file_from_disk($user->display_picture, "profile_photos"),
                            ];
                        }
                    }
                }

                $data[] = [
                    "_id" => $discussion->id,
                    "type" => $discussion->type,
                    "title" => $discussion->title,
                    "last_message" => $message_content,
                    "unread_messages" => unread_messages_count($discussion->id, request()->user()->id),
                    "time_sent" => $last_msg ? $last_msg->created_at->format("H:i") : "",
                    "sender" => $sender_info,
                ];

                usort($data, 'sortByUnreadMessages');
            }

            $this->response["message"] = "Discussions chat tab retrieved";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;


        return response()->json($this->response, $this->response["status"]);
    }

    public function get_messages($discussion)
    {
        $data = [];
        $this->response["message"] = "No data found";
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;
        $case_id = 0;
        $discuss_info = [];

        $discussion = $this->get_discussion($discussion);

        if ($discussion) {
            $messages = CaseDiscussionMessage::where("cd_id", $discussion->id)->orderBy("id", "asc")->paginate(200);

            if ($messages->isNotEmpty()) {
                foreach ($messages as $message) {
                    $message_data = [];
                    if ($message->message_type == "text") {
                        $message_data = [
                            "message" => $message->content,
                            "type" => "text",
                        ];
                    }
                    elseif ($message->message_type == "file") {
                        $file_information = [];
                        $db_file_information = unserialize($message->content);

                        foreach ($db_file_information as $key => $file) {
                            $db_file_information[$key]["path"] = get_model_file_from_disk($file["path"], "case_discussion_documents");
                            $db_file_information[$key]["size"] = format_bytes($file["size"]);

                            foreach ($db_file_information[$key] as $dis_key => $dis_value) {
                                $file_information[$dis_key] = $dis_value;
                            }
                        }

                        $message_data = [
                            "message" => $file_information,
                            "type" => "file",
                            "datetime" => $message->created_at->format("d M Y | h:i"),
                        ];
                    }
                    elseif ($message->message_type == "scheduler") {
                        $meeting_information = unserialize($message->content);

                        $message_data = [
                            "message" => $meeting_information,
                            "type" => "meeting",
                        ];
                    }
                    elseif ($message->message_type == "poll") {
                        $poll_information = unserialize($message->content);

                        if (count($poll_information)) {
                            $my_vote = null;
                            if (count($poll_information["options"])) {
                                $my_vote = CaseDiscussionAction::where("cdm_id", $message->id)->where("user_id", $user_id)->where("action", "vote")->first();
                                $all_votes = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->count();

                                foreach ($poll_information["options"] as $option) {
                                    $voters = [];
                                    $votes = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->where("response", $option)->get();

                                    if ($votes->isNotEmpty()) {
                                        foreach ($votes as $vote) {
                                            if (!$poll_information["anon_voting"]) {
                                                $voters[] = get_model_file_from_disk($vote->user->display_picture, "profile_photos");
                                            }
                                            else {
                                                $voters[] = "";
                                            }
                                        }
                                    }

                                    $poll_count = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->where("response", $option)->count();
                                    $options[$option] = [
                                        "percentage" => $poll_count ? (($poll_count/$all_votes) * 100)."%" : "0%",
                                        "voters" => $voters,
                                    ];
                                }
                            }
                            $message_data = [
                                "message" => [
                                    "question" => $poll_information["question"],
                                    "options" => $poll_information["options"],
                                    "vote_results" => $options
                                ],
                                "type" => "poll",
                                "my_answer" => $my_vote ? $my_vote->response : ""
                            ];
                        }
                    }
                    elseif ($message->message_type == "status update") {
                        $db_status_information = unserialize($message->content);
                        $db_status_information = (object) $db_status_information;
                        $message_data = [
                            "message" => [
                                "summary" => $db_status_information->summary,
                                "resolution_reached" => $db_status_information->resolution_reached,
                                "status" => $db_status_information->status
                            ],
                            "type" => "status update",
                        ];
                    }

                    if (!empty($message_data)) {
                        $user = $message->user;

                        if ($user) {
                            if ($user->id == $user_id) {
                                $sender_info = [
                                    "sender" => "You",
                                    "_id" => $user->id,
                                    "photo" => get_model_file_from_disk($user->display_picture, "profile_photos"),
                                ];
                            }
                            else {
                                $sender_info = [
                                    "sender" => trim($user->first_name.' '.$user->last_name),
                                    "_id" => $user->id,
                                    "photo" => get_model_file_from_disk($user->display_picture, "profile_photos"),
                                ];
                            }

                            $message_data["sender"] = $sender_info;
                        }
                        $message_data["_id"] = $message->id;
                        $message_data["time_sent"] = $message->created_at->format("h:i");
                        $data[] = $message_data;
                    }
                }

                record_last_read_message($discussion->id, $user_id, $messages->last()->id);
            }
            $dispute = $discussion->dispute;

            if ($dispute) {
                $discuss_info = [
                    "group_name" => trim($discussion->title),
                    "group_photo" => get_model_file_from_disk($discussion->dispute->union_data->logo, "union_logos"),
                ];

                $case_id = $dispute->id;
            }

            $this->response["discuss_info"] = $discuss_info;
            $this->response["case_id"] = $case_id;
            $this->response["message"] = "Messages from chat retrieved";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function send_message(Request $request, $discussion)
    {
        $user_id = request()->user()->id;

        $discussion = $discussion = $this->get_discussion($discussion);

        $validator = Validator::make($request->all(), [
            "type" => "required|in:text,poll,meeting",
            "message" => "required_if:type,text",
            "poll_question" => "required_if:type,poll",
            "poll_options" => "required_if:type,poll|array",
            "poll_options.*" => "required_if:type,poll|string",
            "anon_voting" => "required_if:type,poll|in:0,1",
            "meeting_title" => "required_if:type,meeting|string|min:2",
            "meeting_date" => "required_if:type,meeting|date",
            "meeting_location" => "required_if:type,meeting|string|min:2",
            "meeting_start_time" => "required_if:type,meeting|string|min:2",
            "meeting_end_time" => "required_if:type,meeting|string|min:2",
            "reply_to" => "nullable|integer",
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            if ($discussion) {
                if ($request->type == "text") {
                    CaseDiscussionMessage::create([
                        "cd_id" => $discussion->id,
                        "user_id" => $user_id,
                        "message_type" => "text",
                        "content" => $request->message,
                        "reply_id" => $request->reply_to ?? 0,
                    ]);
                }
                elseif ($request->type == "poll") {
                    $info_array = [
                        "question" => $request->poll_question,
                        "options" => $request->poll_options,
                        "anon_voting" => $request->anon_voting
                    ];
                    CaseDiscussionMessage::create([
                        "cd_id" => $discussion->id,
                        "user_id" => $user_id,
                        "message_type" => "poll",
                        "content" => serialize($info_array),
                        "reply_id" => $request->reply_to ?? 0,
                    ]);
                }
                elseif ($request->type == "meeting") {
                    $info_array = [
                        "title" => $request->meeting_title,
                        "date" => Carbon::parse($request->meeting_date)->format("F d Y"),
                        "location" => $request->meeting_location,
                        "start_time" => $request->meeting_start_time,
                        "end_time" => $request->meeting_end_time,
                    ];
                    CaseDiscussionMessage::create([
                        "cd_id" => $discussion->id,
                        "user_id" => $user_id,
                        "message_type" => "scheduler",
                        "content" => serialize($info_array),
                        "reply_id" => $request->reply_to ?? 0,
                    ]);
                }

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Message sent successfully!";
            }
            else {
                $this->response["message"] = "We are unable to deliver your message to this group. Kindly contact tech support for help";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_poll_result(Request $request, $discussion)
    {
        $discussion = $this->get_discussion($discussion);

        if ($discussion) {
            $message = CaseDiscussionMessage::where("cd_id", $discussion->id)->where("id", $request->message_id)->where("message_type", "poll")->first();

            if ($message) {
                $poll_information = unserialize($message->content);

                if (count($poll_information)) {
                    if (count($poll_information["options"])) {
                        $all_votes = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->count();

                        foreach ($poll_information["options"] as $option) {
                            $voters = [];
                            $votes = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->where("response", $option)->get();

                            if ($votes->isNotEmpty()) {
                                foreach ($votes as $vote) {
                                    if (!$poll_information["anon_voting"]) {
                                        $voters[] = get_model_file_from_disk($vote->user->display_picture, "profile_photos");
                                    }
                                    else {
                                        $voters[] = "";
                                    }
                                }
                            }

                            $poll_count = CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->where("response", $option)->count();
                            $options[$option] = [
                                "percentage" => $poll_count ? (($poll_count/$all_votes) * 100)."%" : "0%",
                                "voters" => $voters,
                            ];
                        }
                    }

                    $this->response["message"] = "Messages from chat retrieved";
                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["data"] = $options;
                }
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function vote_on_poll(Request $request, $discussion)
    {
        $user_id = request()->user()->id;
        $form_error_msg = [];

        $discussion = $this->get_discussion($discussion);

        $validator = Validator::make($request->all(), [
            "poll_id" => "required|integer",
            "poll_value" => "required|string",
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            if ($discussion) {
                $poll_message = CaseDiscussionMessage::where("id", $request->poll_id)->where("message_type", "poll")->first();

                if ($poll_message) {
                    $poll_information = unserialize($poll_message->content);

                    if (in_array($request->poll_value, $poll_information["options"])) {
                        $vote_data = CaseDiscussionAction::where("cdm_id", $poll_message->id)->where("user_id", $user_id)->where("action", "vote")->first();

                        if ($vote_data) {
                            $vote_data->response = $request->poll_value;
                            $vote_data->save();
                        }
                        else {
                            CaseDiscussionAction::create([
                                "cdm_id" => $poll_message->id,
                                "cd_id" => $poll_message->cd_id,
                                "user_id" => $user_id,
                                "action" => "vote",
                                "response" => $request->poll_value,
                            ]);
                        }

                        $this->response["status"] = Response::HTTP_OK;
                        $this->response["message"] = "Voted on poll successfully!";
                    }
                    else {
                        $form_error_msg['poll_value'] = ['You have selected an invalid option'];
                    }
                }
                else {
                    $form_error_msg['poll_value'] = ['This message is not a poll'];
                }
            }
            else {
                $this->response["message"] = "We are unable to deliver your message to this group. Kindly contact tech support for help";
            }
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_user(Request $request, $discussion)
    {
        $user_id = $request->user_id;
        $discussion = $this->get_discussion($discussion);
        $view_user = false;
        $role_in_dispute = "";

        if ($discussion && $user_id) {
            $dispute = $discussion->dispute;

            if ($dispute) {
                if ($dispute->created_by == $user_id) {
                    $view_user = true;
                    $role_in_dispute = "Claimant";
                }
                else {
                    $view_user = $dispute->involved_parties->where("user_id", $user_id)->first();
                }

                if ($view_user) {
                    $user = User::find($user_id);

                    if ($user) {
                        $role_in_dispute = $role_in_dispute ? $role_in_dispute : $view_user->role->name;
                        $org_key = "name";
                        $organization = get_user_organization_name($user);
                        $organization_name = (count($organization) && isset($organization[$org_key])) ? "(".$organization[$org_key].")" : "";

                        $this->response["message"] = "User details retrieved";
                        $this->response["status"] = Response::HTTP_OK;
                        $this->response["data"] = [
                            "photo" => get_model_file_from_disk($user->photo, "profile_photos"),
                            "email" => $user->email,
                            "phone" => $user->phone,
                            "role_in_dispute" => $role_in_dispute,
                            "name_organisation" => trim($user->first_name.' '.$user->last_name.' '.$organization_name),
                            "files" => get_discussion_files($discussion, $user->id)
                        ];
                    }
                }
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function upload_document(Request $request, $discussion)
    {
        $user_id = request()->user()->id;
        $form_error_msg = [];

        $discussion = $this->get_discussion($discussion);

        $validator = Validator::make($request->all(), [
            "document" => "required|file|max:10240",
            "reply_to" => "nullable|integer",
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            if ($discussion) {
                if ($request->hasFile("document")) {
                    $document = $request->file('document');

                    $oducment_original_name = strtolower($document->getClientOriginalName());
                    $oducment_original_name = str_replace(" ", "-", $oducment_original_name);

                    $document_file_name = time()."__".$oducment_original_name;
                    $document->storeAs("", $document_file_name, ['disk' => 'case_discussion_documents']);

                    $uplaoded_docs[] = [
                        "path" => $document_file_name,
                        "name" => $oducment_original_name,
                        "size" => $document->getSize(),
                        "type" => $document->getClientOriginalExtension()
                    ];

                    CaseDiscussionMessage::create([
                        "cd_id" => $discussion->id,
                        "user_id" => $user_id,
                        "message_type" => "file",
                        "content" => serialize($uplaoded_docs),
                        "reply_id" => $request->reply_to ?? 0,
                    ]);

                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["message"] = "Document uploaded successfully!";
                }
            }
            else {
                $this->response["message"] = "We are unable to deliver your message to this group. Kindly contact tech support for help";
            }
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    private function get_discussion(int $discussion)
    {
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;

        return CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            })->orWhereHas('dispute', function($sub_query) use ($user_id) {
                $sub_query->where("created_by", $user_id);
            });
        })
        ->where("id", $discussion)
        ->first();
    }
}
