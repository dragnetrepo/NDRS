<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\CaseDiscussionMessage;
use Illuminate\Http\Request;
use App\Models\Union;
use App\Models\CaseDocument;
use App\Models\CaseDispute;
use App\Models\Notification;
use App\Models\UnionBranch;
use App\Models\UnionSubBranch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Response;

class DashboardController extends Controller
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

    public function index()
    {
        $user_id = request()->user()->id;

        $data = [
            "pending_disputes" => [
                "count" => 0,
                "data" => []
            ],
            "recent_documents" => [
                "count" => 0,
                "data" => []
            ],
            "recent_messages" => [
                "count" => 0,
                "data" => []
            ],
            "recent_notifications" => [
                "count" => 0,
                "data" => []
            ],
            "report" => [
                "count" => 0,
                "data" => []
            ],
        ];

        $pending_disputes = CaseDispute::pending()->count();
        $data["pending_disputes"]["count"] = number_format($pending_disputes);

        $recent_discussions = CaseDiscussionMessage::whereHas('discussion', function($query) {
            $query->whereHas('dispute', function($sub_query) {
                $sub_query->where(function($user_filter_query){
                    $user_filter_query->whereHas('involved_parties', function($user_query){
                        $user_query->where("user_id", request()->user()->id);
                    })
                    ->orWhere("created_by", request()->user()->id);
                });
            });
        })
        ->latest()
        ->get()
        ->take(4);

        if ($recent_discussions->isNotEmpty()) {
            foreach ($recent_discussions as $discussion) {
                $data["recent_messages"]["data"][] = $this->prepare_messages_data($discussion, $user_id);
            }
        }

        $recent_notifications = get_user_notifications(false, "all", 0, 5);

        if ($recent_notifications->isNotEmpty()) {
            foreach ($recent_notifications as $notification) {
                $data["recent_notifications"]["data"][] = [
                    "_id" => $notification->id,
                    "message" => $notification->message,
                    "is_read" => $notification->is_read,
                    "date" => Carbon::parse($notification->created_at)->diffForHumans(),
                    "photo" => get_model_file_from_disk(($notification->user_triggered->display_picture ?? ""), "profile_photos"),
                ];
            }
        }


        $recent_documents = CaseDocument::where(function($query) use ($user_id) {
            $query->where("user_id", $user_id)
            ->orwhereHas('dispute', function($sub_query) use ($user_id) {
                $sub_query->whereHas('involved_parties', function($query) use ($user_id) {
                    $query->where("user_id", $user_id);
                })
                ->orWhere('created_by', $user_id);
            });
        })
        ->latest()
        ->get()
        ->take(4);

        if ($recent_documents->isNotEmpty()) {
            foreach ($recent_documents as $document) {
                $data["recent_documents"]["data"][] = [
                    "case_no" => $document->dispute->case_no ?? "",
                    "name" => $document->doc_name,
                    "size" => format_bytes($document->doc_size),
                    "type" => $document->doc_type,
                    "date_modified" => Carbon::parse($document->updated_at)->format("jS F Y"),
                    "time_modified" => Carbon::parse($document->updated_at)->format("h:ia"),
                ];
            }
        }

        $this->response["data"] = $data;
        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Dashboard data retrieved";

        return response()->json($this->response, $this->response["status"]);
    }

    public function search(Request $request)
    {
        $data = [
            "disputes" => [
                "count" => 0,
                "data" => []
            ],
            "documents" => [
                "count" => 0,
                "data" => []
            ],
            "users" => [
                "count" => 0,
                "data" => []
            ],
            "unions" => [
                "count" => 0,
                "data" => []
            ],
            "branches" => [
                "count" => 0,
                "data" => []
            ],
            "sub branches" => [
                "count" => 0,
                "data" => []
            ],
        ];

        $search_keyword = $request->q;
        $document_type = $request->doc_type;
        $case_status = $request->case_status;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $order_by = in_array($request->order_by, ["asc", "desc"]) ? $request->order_by : "desc";

        // Search database for keyword
        if ($search_keyword || $case_status || $start_date || $end_date || $request->order_by) {
            $disputes = CaseDispute::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("case_title", "LIKE", "%$search_keyword%");
            })
            ->when($case_status, function($query) use ($case_status) {
                $query->where("status", $case_status);
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($disputes->isNotEmpty()) {
                $data["disputes"]["count"] = $disputes->count();
                foreach ($disputes as $dispute) {
                    $data["disputes"]["data"][] = [
                        "_id" => $dispute->id,
                        "full_title" => $dispute->case_no.' - '.$dispute->case_title,
                        "title" => $dispute->case_title,
                        "status" => $dispute->status,
                    ];
                }
            }
        }

        if ($search_keyword || $document_type || $start_date || $end_date || $request->order_by) {
            $documents = CaseDocument::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("doc_name", "LIKE", "%$search_keyword%");
            })
            ->when($document_type, function($query) use ($document_type) {
                $query->whereIn("doc_type", $document_type);
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($documents->isNotEmpty()) {
                $data["documents"]["count"] = $documents->count();
                foreach ($documents as $document) {
                    $data["documents"]["data"][] = [
                        "_id" => $document->id,
                        "document_name" => $document->doc_name,
                        "document_path" => get_model_file_from_disk($document->doc_path, "case_documents"),
                        "date_added" => $document->created_at->diffForHumans(),
                    ];
                }
            }
        }

        if ($search_keyword || $start_date || $end_date || $request->order_by) {
            $users = User::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("name", "LIKE", "%$search_keyword%");
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($users->isNotEmpty()) {
                $data["users"]["count"] = $users->count();
                foreach ($users as $user) {
                    $data["users"]["data"][] = [
                        "_id" => $user->id,
                        "name" => $user->name,
                        "photo" => get_model_file_from_disk($user->display_picture, "profile_photos"),
                        "status" => $user->status,
                    ];
                }
            }

            $unions = Union::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("name", "LIKE", "%$search_keyword%");
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($unions->isNotEmpty()) {
                $data["unions"]["count"] = $unions->count();
                foreach ($unions as $union) {
                    $data["unions"]["data"][] = [
                        "_id" => $union->id,
                        "name" => $union->name,
                        "logo" => get_model_file_from_disk($union->logo, "union_logos"),
                    ];
                }
            }

            $union_branches = UnionBranch::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("name", "LIKE", "%$search_keyword%");
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($union_branches->isNotEmpty()) {
                $data["branches"]["count"] = $union_branches->count();
                foreach ($union_branches as $union_branch) {
                    $data["branches"]["data"][] = [
                        "_id" => $union_branch->id,
                        "name" => $union_branch->name,
                        "logo" => get_model_file_from_disk($union_branch->logo, "union_branch_logos"),
                    ];
                }
            }

            $union_sub_branches = UnionSubBranch::when($search_keyword, function($query) use ($search_keyword) {
                $query->where("name", "LIKE", "%$search_keyword%");
            })
            ->when($start_date, function($query) use ($start_date) {
                $query->where("created_at", ">=", $start_date);
            })
            ->when($end_date, function($query) use ($end_date) {
                $query->where("created_at", ">=", $end_date);
            })
            ->orderBy("created_at", $order_by)
            ->get();

            if ($union_sub_branches->isNotEmpty()) {
                $data["sub branches"]["count"] = $union_sub_branches->count();
                foreach ($union_sub_branches as $union_sub_branch) {
                    $data["sub branches"]["data"][] = [
                        "_id" => $union_sub_branch->id,
                        "name" => $union_sub_branch->name,
                        "logo" => get_model_file_from_disk($union_sub_branch->logo, "union_sub_branch_logos"),
                    ];
                }
            }
        }

        $this->response["data"] = $data;
        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Search results retrieved";

        return response()->json($this->response, $this->response["status"]);
    }

    public function reports(Request $request)
    {
        $data = [];
    }

    private function prepare_messages_data(CaseDiscussionMessage $discussion, int $user_id): array
    {
        $message_data = [];
        $user = $discussion->user;
        $sender_info = [
            "sender" => "Unknown",
            "photo" => "",
        ];

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

        $message_data["sender"] = $sender_info;
        $message_data["unread_messages"] = unread_messages_count($discussion->id, $user_id);
        $message_data["case_no"] = $discussion->discussion->dispute->case_no ?? "";
        $message_data["time_sent"] = $discussion->created_at->format("h:i");

        if ($discussion->message_type == "text") {
            $message_data["message"] = $discussion->content;
        }
        elseif ($discussion->message_type == "poll") {
            $message_data["message"] = $sender_info["sender"]." created a poll on the chat";
        }
        elseif ($discussion->message_type == "file") {
            $message_data["message"] = $sender_info["sender"]." sent a document to the chat";
        }
        elseif ($discussion->message_type == "scheduler") {
            $message_data["message"] = $sender_info["sender"]." scheduled a new meeting on the chat";
        }
        elseif ($discussion->message_type == "status update") {
            $message_data["message"] = $sender_info["sender"]." updated dispute status on the chat";
        }
        else {
            $message_data["message"] = " - - -";
        }

        return $message_data;
    }
}
