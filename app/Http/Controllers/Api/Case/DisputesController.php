<?php

namespace App\Http\Controllers\Api\Case;

use App\Http\Controllers\Controller;
use App\Http\Requests\Case\DisputeRequest;
use App\Http\Requests\Case\InvitePartyRequest;
use App\Http\Requests\Case\InviteResponseRequest;
use App\Models\CaseAccusedUnion;
use App\Models\CaseDispute;
use App\Models\CaseRoles;
use App\Models\CaseUserRoles;
use App\Models\OutgoingMessages;
use App\Models\Union;
use App\Models\UnionBranch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DisputesController extends Controller
{
    protected $response;
    protected $outgoing_messages;

    public function __construct()
    {
        $this->response = [
            'status' => Response::HTTP_FORBIDDEN,
            'message' => 'We could not complete your request. Please try again!',
            'error' => []
        ];
        $this->outgoing_messages = new OutgoingMessages();
    }

    public function index()
    {
        $user_id = request()->user()->id;
        $disputes = CaseDispute::where(function($query) use ($user_id) {
            $query->where("created_by", $user_id)->orWhereHas('union_data.users', function ($query) use ($user_id) {
                $query->where("user_id", $user_id);
            });
        })
        ->get();

        $data = [];
        $this->response["message"] = "No data found";

        if ($disputes->isNotEmpty()) {
            foreach ($disputes as $dispute) {
                $data[] = [
                    "_id" => $dispute->id,
                    "case_no" => $dispute->case_no,
                    "title" => $dispute->case_title,
                    "type" => $dispute->dispute_type,
                    "summary" => $dispute->summary_of_dispute,
                    "background_info" => $dispute->background_info,
                    "relief_sought" => $dispute->relief_sought,
                    "specific_claims" => $dispute->specific_claims,
                    "negotiation_terms" => $dispute->negotiation_terms,
                    "status" => $dispute->status,
                    "involved_parties" => [
                        "claimant" => [
                            "name" => $dispute->union_data->name,
                            "logo" => $dispute->union_data->logo ? asset('/union/'.$dispute->union_data->logo) : ""
                        ],
                        "accused" => [
                            "name" => $dispute->accused ? $dispute->accused->union->name : "",
                            "logo" => $dispute->accused ? asset('/union/'.$dispute->accused->union->logo) : "",
                        ],
                    ]
                ];
            }

            $this->response["message"] = "Retrieved dispute list";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function read($case_id)
    {
        $user_id = request()->user()->id;
        $data = [];
        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            $data = [
                "case_no" => $dispute->case_no,
                "title" => $dispute->case_title,
                "type" => $dispute->dispute_type,
                "summary" => $dispute->summary_of_dispute,
                "background_info" => $dispute->background_info,
                "relief_sought" => $dispute->relief_sought,
                "specific_claims" => $dispute->specific_claims,
                "negotiation_terms" => $dispute->negotiation_terms,
                "status" => $dispute->status,
                "union" => $dispute->union_data->name,
                "union_branch" => $dispute->union_branch_data ? $dispute->union_branch_data->name : '',
            ];

            $this->response["message"] = "Fetched case dispute data";
            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function create(DisputeRequest $request)
    {
        $this->response["message"] = "We could not add the dispute at this time. Please try again!";
        $form_error_msg = [];

        try {
            $union = Union::where("id", $request->initiating_party)->first();

            if ($union) {
                $case_dispute = CaseDispute::create([
                    "case_no" => "DS".$this->generateCaseID(),
                    "case_title" => $request->title,
                    "dispute_type" => $request->type,
                    "summary_of_dispute" => $request->summary,
                    "background_info" => $request->background_info,
                    "relief_sought" => $request->relief_sought,
                    "specific_claims" => $request->specific_claims,
                    "negotiation_terms" => $request->negotiation_terms,
                    "status" => "pending approval",
                    "union" => $union->id,
                    "created_by" => request()->user()->id,
                ]);

                if ($case_dispute) {
                    if (Union::where("id", $request->accused_party)->exists()) {
                        CaseAccusedUnion::create([
                            "case_id"  => $case_dispute->id,
                            "union_id" => $request->accused_party
                        ]);
                    }

                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["message"] = "Dispute has been created successfully!";
                }
            }
            else {
                $form_error_msg['union'] = ['Union does not exist in our records'];
            }


            if (!empty($form_error_msg)) {
                $this->response["status"] = Response::HTTP_UNAUTHORIZED;
                $this->response["message"] = 'Validation errors';
                $this->response["error"] = $form_error_msg;
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function edit(DisputeRequest $request, $case_id)
    {
        $case_dispute = CaseDispute::find($case_id);

        if ($case_dispute) {
            $case_dispute->case_title = $request->title;
            $case_dispute->dispute_type = $request->type;
            $case_dispute->summary_of_dispute = $request->summary;
            $case_dispute->background_info = $request->background_info;
            $case_dispute->relief_sought = $request->relief_sought;
            $case_dispute->specific_claims = $request->specific_claims;
            $case_dispute->negotiation_terms = $request->negotiation_terms;

            if ($case_dispute->save()) {
                // Add new unions added to this case
                CaseAccusedUnion::updateorCreate([
                    "case_id"  => $case_dispute->id,
                ],[
                    "case_id"  => $case_dispute->id,
                    "union_id" => $request->accused_party
                ]);

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Dispute has been modified successfully!";
            }
        }
        else {
            $this->response["message"] = "We could not locate the requested case dispute.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function roles()
    {
        $roles = CaseRoles::get();
        $data = [];

        if ($roles->isNotEmpty()) {
            foreach ($roles as $role) {
                $data[] = [
                    "_id" => $role->id,
                    "name" => ucwords($role->name),
                ];
            }
        }

        $this->response["message"] = "Fetched case dispute roles data";
        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function involved_parties($case_id)
    {
        $user_id = request()->user()->id;
        $data = [];
        $dispute = $dispute = get_case_dispute($case_id, $user_id);;

        if ($dispute) {
            if ($dispute->involved_parties->count()) {
                foreach ($dispute->involved_parties as $involved_party) {
                    $user = $involved_party->user;

                    $data[$involved_party->role->name][] = [
                        "_id" => $involved_party->id,
                        "name" => $user ? trim($user->last_name.' '.$user->first_name) : '',
                        "email" => $user ? $user->email : $involved_party->email,
                        "joined" => Carbon::parse(($involved_party->response_date ? $involved_party->response_date : $involved_party->created_at))->format("M d Y"),
                        "role" => $involved_party->role->name,
                        "status" => $involved_party->status,
                        "display_picture" => ($user && $user->display_picture) ? asset('/user/'.$user->display_picture) : '',
                    ];
                }

                $this->response["message"] = "Fetched case dispute involved parties data";
                $this->response["status"] = Response::HTTP_OK;
                $this->response["data"] = $data;
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function invite_party(InvitePartyRequest $request, $case_id)
    {
        try {
            $dispute = CaseDispute::where("id", $case_id)->first();
            $form_error_msg = [];

            if ($dispute) {
                $send_invite = false;
                $case_role = CaseRoles::where('id', $request->role)->first();

                if ($case_role) {
                    $invited_user_id = 0;
                    $invited_user_email = $request->email;

                    $user = User::where('email', $request->email)->first();

                    if ($user) {
                        $invited_user_id = $user->id;
                        $invited_user_email = $user->email;
                    }

                    $has_access_to_case = CaseUserRoles::where("case_id", $dispute->id)
                            ->when(($invited_user_id > 0), function($query) use ($invited_user_id) {
                                $query->where("user_id", $invited_user_id);
                            })
                            ->when(($invited_user_id == 0), function($query) use ($invited_user_email) {
                                $query->where("email", $invited_user_email);
                            })
                            ->first();

                    if (!$has_access_to_case) {
                        $send_invite = true;
                    }
                    elseif ($has_access_to_case && in_array($has_access_to_case->status, ["pending", "rejected"])) {
                        $send_invite = true;
                        $has_access_to_case->delete();
                    }

                    if ($send_invite) {
                        CaseUserRoles::create([
                            "case_id" => $dispute->id,
                            "case_role_id" => $case_role->id,
                            "user_id" => $invited_user_id,
                            "email" => $invited_user_email,
                        ]);

                        send_out_case_invitation($dispute->case_no, $invited_user_id, $invited_user_email, $case_role->name);

                        $this->response["message"] = "Invite has been sent to this user successfully!";
                        $this->response["status"] = Response::HTTP_OK;
                    }
                    else {
                        $form_error_msg["email"] = ["User has already been invited to this case."];
                    }
                }
                else {
                    $form_error_msg["role"] = ["Role submitted does not match our records"];
                }

            }

            if (!empty($form_error_msg)) {
                $this->response["status"] = Response::HTTP_UNAUTHORIZED;
                $this->response["message"] = 'Validation errors';
                $this->response["error"] = $form_error_msg;
            }
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_invites()
    {
        $user_email = request()->user()->email;

        $case_dispute_invites = CaseUserRoles::where("status", "pending")->whereHas('dispute')->where("user_id", $user_email)->get();
        $data = [];

        if ($case_dispute_invites->isNotEmpty()) {
            foreach ($case_dispute_invites as $invite) {
                $data[] = [
                    "case_id" => $invite->case_id,
                    "title" => $invite->dispute->case_title,
                ];
            }

        }

        $this->response["message"] = "Fetched case dispute invites";
        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;


        return response()->json($this->response, $this->response["status"]);
    }

    public function invite_response(InviteResponseRequest $request, $case_id)
    {
        $user_email = request()->user()->email;

        $case_dispute = CaseUserRoles::where("case_id", $case_id)
                ->where("user_id", $user_email)
                ->first();

        if ($case_dispute) {
            if ($case_dispute->status == "pending") {
                if ($request->invite_response == "yes") {
                    $case_dispute->status = "active";
                }
                else {
                    $case_dispute->status = "rejected";
                }

                $case_dispute->response_date = Carbon::now();
                $case_dispute->save();

                $this->response["message"] = "Response has been saved successfully!";
                $this->response["status"] = Response::HTTP_OK;
            }
            else {
                $this->response["message"] = "You have already responded to the invite on this case.";
                $this->response["status"] = Response::HTTP_OK;
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function suspend_invite_party(Request $request, $case_id)
    {
        $email = $request->email;

        $invited_user = CaseUserRoles::where('email', $email)->where('case_id', $case_id)->first();

        if ($invited_user) {
            $invited_user->status = "suspended";
            $invited_user->save();

            $this->response["message"] = "Invite has been suspended for this user successfully.";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "We could not locate the requested user linked to this case.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function delete_invite_party(Request $request, $case_id)
    {
        $email = $request->email;

        $invited_user = CaseUserRoles::where('email', $email)->where('case_id', $case_id)->first();

        if ($invited_user->status == 'pending') {
            $invited_user->delete();

            $this->response["message"] = "Invite has been deleted for this user successfully.";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "User has already responded to this invite and cannot have their invite deleted. You can suspend their invite instead.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    private function generateCaseID()
    {
        $last_case = CaseDispute::orderBy('id', 'desc')->first();
        $arrayOfZeroes = [
            1 => "000",
            2 => "00",
            3 => "0",
        ];

        if ($last_case) {
            if ($last_case->id) {
                $case_id_length = mb_strlen($last_case->id);
                if (isset($arrayOfZeroes[$case_id_length])) {
                    return $arrayOfZeroes[$case_id_length].($last_case->id + 1);
                }
                else {
                    return $last_case->id + 1;
                }
            }
        }

        return "0001";
    }
}
