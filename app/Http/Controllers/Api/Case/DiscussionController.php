<?php

namespace App\Http\Controllers\Api\Case;

use App\Http\Controllers\Controller;
use App\Models\CaseDiscussion;
use App\Models\CaseDiscussionAction;
use App\Models\CaseDiscussionMessage;
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

                if ($last_msg) {
                    $user = $last_msg->user;

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
                    "time_sent" => $last_msg ? $last_msg->created_at->format("h:i") : "",
                    "sender" => $sender_info,
                ];
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

        $discussion = CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            });
        })
        ->where("id", $discussion)
        ->first();

        if ($discussion) {
            $messages = CaseDiscussionMessage::where("cd_id", $discussion->id)->orderBy("id", "desc")->paginate(50);
            $data = [];

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
                        $file_information = unserialize($message->content);

                        foreach ($file_information as $key => $file) {
                            $file_information[$key]["path"] = get_model_file_from_disk($file["path"], "case_discussion_documents");
                        }

                        $message_data = [
                            "message" => $file_information,
                            "type" => "file",
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

                                    $options[$option] = [
                                        "percentage" => ((CaseDiscussionAction::where("cdm_id", $message->id)->where("action", "vote")->where("response", $option)->count()/$all_votes) * 100)."%",
                                        "voters" => $voters,
                                    ];
                                }
                            }
                            $message_data = [
                                "message" => [
                                    "question" => $poll_information["question"],
                                    "options" => $options,
                                    "vote_results"
                                ],
                                "type" => "poll",
                            ];
                        }
                    }

                    if (!empty($message_data)) {
                        $message_data["_id"] = $message->id;
                        $message_data["time_sent"] = $message->created_at->format("h:i");
                        $data[] = $message_data;
                    }
                }

                $this->response["message"] = "Messages from chat retrieved";
            }
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function send_message(Request $request, $discussion)
    {
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;

        $discussion = CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            });
        })
        ->where("id", $discussion)
        ->first();

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

    public function vote_on_poll(Request $request, $discussion)
    {
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;
        $form_error_msg = [];

        $discussion = CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            });
        })
        ->where("id", $discussion)
        ->first();

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

    public function upload_document(Request $request, $discussion)
    {
        $admin_user = user_is_admin();
        $user_id = request()->user()->id;
        $form_error_msg = [];

        $discussion = CaseDiscussion::when((!$admin_user), function($query) use ($user_id) {
            $query->whereHas('dispute.involved_parties', function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            });
        })
        ->where("id", $discussion)
        ->first();

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
}
