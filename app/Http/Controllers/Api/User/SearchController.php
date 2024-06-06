<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Union;
use App\Models\CaseDocument;
use App\Models\CaseDispute;
use App\Models\UnionBranch;
use App\Models\UnionSubBranch;
use App\Models\User;
use Illuminate\Http\Response;

class SearchController extends Controller
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
        if ($search_keyword || $document_type || $case_status || $start_date || $end_date || $request->order_by) {
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
                        "date_added" => $document->created_at->diffForHumans(),
                    ];
                }
            }

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
}
