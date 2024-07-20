<?php

namespace App\Http\Controllers\Api\User;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Models\CaseAccusedUnion;
use App\Models\CaseDiscussionMessage;
use Illuminate\Http\Request;
use App\Models\Union;
use App\Models\CaseDocument;
use App\Models\CaseDispute;
use App\Models\CaseDisputeStatusHistory;
use App\Models\Notification;
use App\Models\SettlementBodyMember;
use App\Models\UnionBranch;
use App\Models\UnionSubBranch;
use App\Models\UnionUserRole;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

        SettlementBodyMember::where("email", request()->user()->email)->orWhere("user_id", $user_id)->where("status", "pending")->update([
            "status" => "active"
        ]);

        UnionUserRole::where("user_id", $user_id)->where("status", "pending")->update([
            "status" => "active"
        ]);

        CaseAccusedUnion::where("email", request()->user()->email)->update([
            "user_id" => request()->user()->id
        ]);

        $pending_disputes = get_case_dispute(0, 0, "case opened");
        $pending_disputes = $pending_disputes->count();
        $data["pending_disputes"]["count"] = number_format($pending_disputes);

        $recent_discussions = CaseDiscussionMessage::whereHas('discussion', function($query) {
            $query->whereHas('dispute', function($sub_query) {
                return $this->dispute_eligible_user($sub_query, request()->user()->id);
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
                return $this->dispute_eligible_user($sub_query, $user_id);
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
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
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
        $period_filter = $request->period;
        $text_filter = $request->text;

        $end_date = Carbon::now();
        if ($period_filter == "one week") {
            $start_date = Carbon::now()->subDays(7);
        }
        elseif ($period_filter == "one month") {
            $start_date = Carbon::now()->subDays(30);
        }
        elseif ($period_filter == "four months") {
            $start_date = Carbon::now()->subDays(120);
        }
        elseif ($period_filter == "eight months") {
            $start_date = Carbon::now()->subDays(240);
        }
        elseif ($period_filter == "one year") {
            $start_date = Carbon::now()->subDays(365);
        }
        elseif ($period_filter == "all time") {
            $end_date = $start_date = null;
        }
        else {
            $end_date = Carbon::now();
            $start_date = Carbon::now()->subDays(30);
        }

        // $filters
        $data = [
            "disputes_approved" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "disputes_satisfaction_score" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "document_uploaded" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "disputes_resolved" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "active_disputes" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "avg_dispute_resolution_time" => [
                "current" => 0,
                "prev_month" => 0,
            ],
            "top_dispute_types" => [],
            "highest_dispute_cases" => [],
            "highest_resolution_rate" => [],
        ];

        $union_search = $user_search = null;
        $allow_generate_report = true;

        if ($text_filter) {
            // Find Union With Name
            $union_search = Union::where("name", $text_filter)->first();

            if (!$union_search) {
                // Find User
                $user_search = User::where("name", $text_filter)->first();

                if (!$user_search) {
                    $allow_generate_report = false;
                }
            }
        }

        if ($allow_generate_report) {
            $case_dispute_type = CaseDispute::selectRaw(DB::raw("dispute_type, COUNT(dispute_type) as occurence"))
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })
            ->groupBy("dispute_type")->get();

            $resolved_dispute_cases = CaseDispute::selectRaw(DB::raw("COUNT(`union`) as `occurence`, `union` as union_id"))->whereHas('union_data')->whereIn("status", CaseDispute::RESOLVED_CASE_STATUSES)
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->groupBy("union")->get();

            $highest_dispute_cases = CaseDispute::selectRaw(DB::raw("COUNT(`union`) as `occurence`, `union` as union_id"))->whereHas('union_data')
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->groupBy("union")->get();

            $disputes_approved = CaseDispute::whereNotIn("status", CaseDispute::PENDING_APPROVAL_CASE_STATUSES)
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->count();

            $disputes_resolved = CaseDispute::whereIn("status", CaseDispute::RESOLVED_CASE_STATUSES)
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->count();

            $active_disputes = CaseDispute::whereIn("status", CaseDispute::ACTIVE_CASE_STATUSES)
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->count();

            // Documents Uploaded
            $case_documents = CaseDocument::where("doc_size", ">", 0)->selectRaw(DB::raw("id, doc_name as identifier"))
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when(!user_is_admin(request()->user()), function($query){
                $query->where("user_id", request()->user()->id)
                    ->orwhereHas('dispute', function($sub_query) {
                    return $this->dispute_eligible_user($sub_query, request()->user()->id);
                });
            });

            $chat_documents = CaseDiscussionMessage::where("message_type", "file")->selectRaw(DB::raw("id, message_type as identifier"))
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when(!user_is_admin(request()->user()), function($query){
                $query->whereHas('discussion', function($query) {
                    $query->whereHas('dispute', function($sub_query) {
                        return $this->dispute_eligible_user($sub_query, request()->user()->id);
                    });
                });
            });

            $all_documents = $chat_documents->union($case_documents)->count();

            $number_of_days = $avg_dispute_time = 0;
            $all_resolved_disputes = CaseDispute::whereIn("status", CaseDispute::RESOLVED_CASE_STATUSES)
            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
            })
            ->when($text_filter, function($query) use ($union_search, $user_search) {
                return $this->additional_text_filter($query, $union_search, $user_search);
            })
            ->where(function($query){
                return $this->dispute_eligible_user($query, request()->user()->id);
            })->get();

            if ($all_resolved_disputes->isNotEmpty()) {
                foreach ($all_resolved_disputes as $dispute) {
                    $case_history = CaseDisputeStatusHistory::where("case_id", $dispute->id)->selectRaw(DB::raw("MIN(created_at) as start_date, MAX(created_at) as end_date"))->groupBy("case_id")->first();
                    if ($case_history) {
                        $days_diff = calculateDaysBetweenDates($case_history->start_date, $case_history->end_date);
                        $number_of_days += ($days_diff ?? 1);
                    }
                }

                if ($number_of_days) {
                    $avg_dispute_time = round($number_of_days/$all_resolved_disputes->count());
                }
            }

            $days_suffix = ($avg_dispute_time == 1) ? "day" : "days";

            $data["disputes_approved"]["current"] = $disputes_approved;
            $data["disputes_resolved"]["current"] = $disputes_resolved;
            $data["active_disputes"]["current"] = $active_disputes;
            $data["document_uploaded"]["current"] = $all_documents;
            $data["avg_dispute_resolution_time"]["current"] = $avg_dispute_time.' '.$days_suffix;

            if ($case_dispute_type->isNotEmpty()) {
                foreach ($case_dispute_type as $dispute_type) {
                    if ($dispute_type->dispute_type > 0) {
                        $data["top_dispute_types"][$dispute_type->dispute_type] = $dispute_type->occurence;
                    }
                }
            }

            if ($resolved_dispute_cases->isNotEmpty()) {
                foreach ($resolved_dispute_cases as $resolved_case) {
                    $get_union = Union::find($resolved_case->union_id);
                    if ($get_union) {
                        $data["highest_resolution_rate"][$get_union->name] = $resolved_case->occurence;
                    }
                }
            }

            if ($highest_dispute_cases->isNotEmpty()) {
                foreach ($highest_dispute_cases as $highest_dispute_case) {
                    $get_union = Union::find($highest_dispute_case->union_id);
                    if ($get_union) {
                        $data["highest_dispute_cases"][$get_union->name] = $highest_dispute_case->occurence;
                    }
                }
            }
        }

        if ($request->export_data) {
            $file_name = 'reports-'.time().'.csv';
            Excel::store(new ReportsExport($data), $file_name, 'reports');

            // Generate a download link
            $downloadLink = get_model_file_from_disk($file_name, 'reports');
            $data = [
                "download_link" => $downloadLink
            ];
        }

        $this->response["data"] = $data;
        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Report retrieved";

        return response()->json($this->response, $this->response["status"]);
    }

    public function dispute_resolutions_report(Request $request)
    {
        $period_filter = $request->period ?? "8 months";
        $text_filter = $request->text;
        $period = $period_retrieved = [];
        $days_difference = [
            "1 week" => 7,
            "1 month" => 30,
            "4 months" => 120,
            "8 months" => 240,
            "1 year" => 365,
        ];

        $difference_start_date = $difference_end_date = null;
        $current_number_days = $difference_number_days = 0;

        $end_date = Carbon::now();
        if ($period_filter == "1 week") {
            $start_date = Carbon::now()->subDays($days_difference["1 week"]);
            $period_retrieved = $this->getDayListFromDate($start_date, $end_date);
        }
        elseif ($period_filter == "1 month") {
            $start_date = Carbon::now()->subDays($days_difference["1 month"]);
        }
        elseif ($period_filter == "4 months") {
            $start_date = Carbon::now()->subDays($days_difference["4 months"]);
        }
        elseif ($period_filter == "8 months") {
            $start_date = Carbon::now()->subDays($days_difference["8 months"]);
        }
        elseif ($period_filter == "1 year") {
            $start_date = Carbon::now()->subDays($days_difference["1 year"]);
        }
        elseif ($period_filter == "all time") {
            $end_date = $start_date = null;
            $period_retrieved = $this->getMonthListFromDate(Carbon::now()->subDays($days_difference["1 year"]), Carbon::now()); // Will get every month required
        }
        else {
            $end_date = Carbon::now();
            $start_date = Carbon::now()->subDays($days_difference["8 months"]);
        }

        if (empty($period_retrieved)) {
            $period_retrieved = $this->getMonthListFromDate($start_date, $end_date);
        }

        foreach ($period_retrieved as $retrieved) {
            $period[$retrieved] = 0;
        }

        if ($start_date && $end_date) {
            $difference_start_date = Carbon::parse($start_date)->subDays($days_difference[$period_filter]);
            $difference_end_date = Carbon::parse($start_date)->subDays($days_difference[$period_filter]);
        }

        $resolved_disputes = CaseDispute::whereIn("status", CaseDispute::RESOLVED_CASE_STATUSES)
                            ->when(($start_date && $end_date), function($query) use ($start_date, $end_date) {
                                $query->where("created_at", ">=", $start_date)->where("created_at", "<=", $end_date);
                            })
                            ->where(function($query){
                                return $this->dispute_eligible_user($query, request()->user()->id);
                            })
                            ->get();

        if ($resolved_disputes->isNotEmpty()) {
            foreach ($resolved_disputes as $dispute) {
                if (in_array($period_filter, ["1 week"])) {
                    $period_name = Carbon::parse($dispute->created_at)->format("l");
                }
                else {
                    $period_name = Carbon::parse($dispute->created_at)->format("F");
                }

                $case_history = CaseDisputeStatusHistory::where("case_id", $dispute->id)->selectRaw(DB::raw("MIN(created_at) as start_date, MAX(created_at) as end_date"))->groupBy("case_id")->first();
                $days_diff = 1;

                if ($case_history) {
                    $days_diff = calculateDaysBetweenDates($case_history->start_date, $case_history->end_date);
                }

                $period[$period_name] = $current_number_days += (($days_diff > 0) ? $days_diff : 1);
            }
        }

        if ($difference_start_date && $difference_end_date) {
            $resolved_disputes = CaseDispute::whereIn("status", CaseDispute::RESOLVED_CASE_STATUSES)
                                ->when(($difference_start_date && $difference_end_date), function($query) use ($difference_start_date, $difference_end_date) {
                                    $query->where("created_at", ">=", $difference_start_date)->where("created_at", "<=", $difference_end_date);
                                })
                                ->where(function($query){
                                    return $this->dispute_eligible_user($query, request()->user()->id);
                                })
                                ->get();

            if ($resolved_disputes->isNotEmpty()) {
                foreach ($resolved_disputes as $dispute) {
                    if (in_array($period_filter, ["one week"])) {
                        $period_name = Carbon::parse($dispute->created_at)->format("l");
                    }
                    else {
                        $period_name = Carbon::parse($dispute->created_at)->format("F");
                    }
                    $case_history = CaseDisputeStatusHistory::where("case_id", $dispute->id)->selectRaw(DB::raw("MIN(created_at) as start_date, MAX(created_at) as end_date"))->groupBy("case_id")->first();
                    if ($case_history) {
                        $days_diff = calculateDaysBetweenDates($case_history->start_date, $case_history->end_date);
                        $difference_number_days += ($days_diff ?? 1);
                    }
                }
            }
        }

        $message_text = "";

        if ($difference_number_days > $current_number_days) {
            if ($current_number_days) {
                $message_text = (($current_number_days/$difference_number_days) * 100). "% decrease";
            }
            else {
                $message_text = "100% decrease";
            }
        }
        elseif ($difference_number_days < $current_number_days) {
            if ($difference_number_days) {
                $message_text = (($difference_number_days/$current_number_days) * 100). "% increase";
            }
            else {
                $message_text = "100% increase";
            }
        }

        if (in_array($period_filter, ["1 week"])) {
            uksort($period, "compareDayNames");
        }
        else {
            uksort($period, "compareMonthNames");
        }

        $this->response["data"] = $period;
        $this->response["period_text"] = $message_text ? $period_filter : "";
        $this->response["report_message"] = $message_text;
        $this->response["message"] = "Dispute resolution Report retrieved successfully!";
        $this->response["status"] = Response::HTTP_OK;

        return response()->json($this->response, $this->response["status"]);
    }

    private function additional_text_filter($query, $union_search, $user_search) {
        return $query->when($union_search, function($sub_query) use ($union_search) {
            $sub_query->where("union", $union_search);
        })
        ->when($user_search, function($sub_query) use ($user_search) {
            return $this->dispute_eligible_user($sub_query, $user_search->id);
        });
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

    private function getMonthListFromDate(Carbon $start, Carbon $end)
    {
        $start->setDay(1);
        foreach (CarbonPeriod::create($start, '1 month', $end) as $month) {
            $months[] = $month->format('F');
        }
        return $months;
    }

    private function getDayListFromDate(Carbon $start, Carbon $end)
    {
        foreach (CarbonPeriod::create($start, '1 days', $end) as $day) {
            $days[] = $day->format('l');
        }
        return $days;
    }

    private function dispute_eligible_user($query, $user_id)
    {
        $user = User::find($user_id);
        $role = (object) get_user_roles($user);

        return $query->when(!user_is_admin($user), function($query) use ($user_id, $role) {
            $query->where("created_by", $user_id)
            ->orWhereHas('involved_parties', function ($query) use ($user_id) {
                $query->where("user_id", $user_id)
                ->orWhereHas('body_member', function($sub_query) use ($user_id) {
                    $sub_query->where("user_id", $user_id);
                });
            })->orWhereHas('accused', function ($query) use ($user_id, $role) {
                $query->where("user_id", $user_id)
                ->when(in_array($role->db_role_name, CaseDispute::ARRAY_OF_ORGANIZATION_ADMINS), function($query)  use ($role) {
                    $query->orWhere(function($sub_query) use ($role) {
                        $sub_query->where('union_id', $role->union_id)
                            ->when($role->union_branch_id, function($query) use ($role) {
                                $query->where('union_branch', $role->union_branch_id);
                            })
                            ->when($role->union_sub_branch_id, function($query) use ($role) {
                                $query->where('union_sub_branch', $role->union_sub_branch_id);
                            });
                    });
                });
            });
        });
    }
}
