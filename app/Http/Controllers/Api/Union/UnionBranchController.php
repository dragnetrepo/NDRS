<?php

namespace App\Http\Controllers\Api\Union;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnionBranch\CreateUnionBranchRequest;
use App\Http\Requests\UnionBranch\SendUnionBranchInviteRequest;
use App\Models\EmailInvitations;
use App\Models\OutgoingMessages;
use App\Models\Union;
use App\Models\UnionBranch;
use App\Models\UnionUserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UnionBranchController extends Controller
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

    public function index(Request $request, $union)
    {
        $data = [];
        $union_branches = UnionBranch::where("union_id", $union)->get();
        $this->response["message"] = "No data found";

        if ($union_branches->isNotEmpty()) {
            foreach ($union_branches as $union_branch) {
                $assigned_admins = [];

                if ($union_branch->users->count()) {
                    foreach ($union_branch->users as $assigned_user) {
                        $user_deets = $assigned_user->user;
                        if ($user_deets) {
                            $assigned_admins = [
                                "photo" => get_model_file_from_disk($user_deets->display_picture ?? "", "profile_photos")
                            ];
                        }
                    }
                }

                $data[] = [
                    "_id" => $union_branch->id,
                    "union_id" => $union_branch->union_id,
                    "union_name" => $union_branch->union->name,
                    "name" => $union_branch->name,
                    "acronym" => $union_branch->acronym,
                    "about" => $union_branch->description,
                    "phone" => $union_branch->phone,
                    "industry_id" => $union_branch->industry->id ?? "",
                    "industry" => $union_branch->industry->name ?? "",
                    "headquarters" => $union_branch->headquarters,
                    "founded_in" => $union_branch->founded_in,
                    "logo" => get_model_file_from_disk($union_branch->logo ?? "", "union_branch_logos"),
                    "assigned_admins" => $assigned_admins,
                    "date_added" => $union_branch->created_at->format("M d Y"),
                ];
            }

            $this->response["message"] = "Retrieved comprehensive union list";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function union_branches(Request $request)
    {
        $data = [];
        $union_set = $request->header("ndrs-union");
        $user_id = $request->user()->id;
        $union_id = 0;

        $user_role = UnionUserRole::where("user_id", $user_id)->when($union_set, function($query) use ($union_set) {
            $query->where("union_id", $union_set);
        })->where("status", "active")->where("branch_id", 0)->first();

        if ($user_role) {
            $union_id = $user_role->union_id;
        }

        if ($union_id) {
            $union_branches = UnionBranch::where("union_id", $union_id)->get();
            $this->response["message"] = "No data found";

            if ($union_branches->isNotEmpty()) {
                foreach ($union_branches as $union_branch) {
                    $assigned_admins = [];

                    if ($union_branch->users->count()) {
                        foreach ($union_branch->users as $assigned_user) {
                            $user_deets = $assigned_user->user;
                            if ($user_deets) {
                                $assigned_admins = [
                                    "photo" => get_model_file_from_disk($user_deets->display_picture ?? "", "profile_photos")
                                ];
                            }
                        }
                    }

                    $data[] = [
                        "_id" => $union_branch->id,
                        "union_id" => $union_branch->union_id,
                        "union_name" => $union_branch->union->name,
                        "name" => $union_branch->name,
                        "acronym" => $union_branch->acronym,
                        "about" => $union_branch->description,
                        "phone" => $union_branch->phone,
                        "industry_id" => $union_branch->industry->id ?? "",
                        "industry" => $union_branch->industry->name ?? "",
                        "headquarters" => $union_branch->headquarters,
                        "founded_in" => $union_branch->founded_in,
                        "logo" => get_model_file_from_disk($union_branch->logo ?? "", "union_branch_logos"),
                        "assigned_admins" => $assigned_admins,
                        "date_added" => $union_branch->created_at->format("M d Y"),
                    ];
                }

                $this->response["message"] = "Retrieved comprehensive union list";
            }

            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
            $this->response["union"] = [
                "_id" => $user_role->union->id,
                "name" => $user_role->union->name,
            ];
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function read($branch)
    {
        $union_branch = UnionBranch::find($branch);

        if ($union_branch) {
            $this->response["data"] = [
                "_id" => $union_branch->id,
                "union_id" => $union_branch->union_id,
                "union_name" => $union_branch->union->name,
                "name" => $union_branch->name,
                "acronym" => $union_branch->acronym,
                "about" => $union_branch->description,
                "phone" => $union_branch->phone,
                "industry_id" => $union_branch->industry->id ?? "",
                "industry" => $union_branch->industry->name ?? "",
                "founded_in" => $union_branch->founded_in,
                "logo" => get_model_file_from_disk($union_branch->logo ?? "", "union_branch_logos"),
                "date_added" => $union_branch->created_at->format("M d Y"),
            ];
            $this->response["message"] = "Union Branch Information Retrieved";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "We could not locate the union you are looking for!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function create(CreateUnionBranchRequest $request)
    {
        $user = $request->user();
        $union = Union::find($request->union);
        try {
            if ($union) {
                $file_name = "";
                if ($request->hasFile("logo")) {
                    // This file
                    $file_name = sha1(time().$user->id).'.'.$request->file('logo')->getClientOriginalExtension();
                    $request->file('logo')->storeAs("", $file_name, ['disk' => 'union_branch_logos']);
                }

                UnionBranch::create([
                    "union_id" => $union->id,
                    "name" => $request->name,
                    "acronym" => $request->acronym ?? '',
                    "phone" => $request->phone,
                    "founded_in" => $request->founded_in,
                    "industry_id" => $request->industry_id,
                    "description" => $request->about,
                    "logo" => $file_name,
                ]);

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Union Branch has been created successfully!";
            }
            else {
                $this->response["status"] = Response::HTTP_UNAUTHORIZED;
                $this->response["message"] = 'Validation errors';
                $this->response["error"] = [
                    'union' => ['Union does not exist in our records']
                ];
            }
        } catch (\Throwable $th) {
            $this->response["status"] = Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->response["message"] = "We are experiencing some troubles create this union at this time. Please try again or contact Tech Support for help";
            $this->response["exception"] = $th->getMessage();
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function edit(CreateUnionBranchRequest $request, $branch)
    {
        $user = $request->user();
        $union_branch = UnionBranch::find($branch);

        if ($union_branch) {
            $union_branch->name = $request->name;
            $union_branch->acronym = $request->acronym ?? '';
            $union_branch->phone = $request->phone;
            $union_branch->industry_id = $request->industry_id;
            $union_branch->description = $request->about;
            $union_branch->founded_in = $request->founded_in;
            $file_name = $union_branch->logo;
            if ($request->hasFile("logo")) {
                // This file
                $file_name = sha1(time().$user->id).'.'.$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->storeAs("", $file_name, ['disk' => 'union_branch_logos']);
            }

            $union_branch->logo = $file_name;
            if ($union_branch->save()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Union Branch has been edited successfully!";
            }
            else {
                $this->response["message"] = "We could not complete your request at this time. Please try again!";
            }
        }
        else {
            $this->response["message"] = "The selected union branch does not match our records!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function delete($branch)
    {
        $union_branch = UnionBranch::find($branch);

        if ($union_branch) {
            if ($union_branch->delete()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Union Branch has been deleted successfully!";
            }
            else {
                $this->response["message"] = "We could not complete your request at this time. Please try again!";
            }
        }
        else {
            $this->response["message"] = "You have made an invalid request. Please try again!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function send_invite(SendUnionBranchInviteRequest $request, $branch)
    {
        try {
            // Check if user has an account to be added as an admin
            $user = User::where("email", $request->email)->first();
            $role = Role::where("id", $request->role)->first();
            $union_branch = UnionBranch::where("id", $branch)->first();
            $curr_user_id = $request->user()->id;

            if ($union_branch) {
                $curr_user_role = UnionUserRole::where("user_id", $curr_user_id)->where("branch_id", $union_branch->id)->first();

                $role_appended = "";

                if ($curr_user_role) {
                    $role_appended = "(".$curr_user_role->role->name.")";
                }

                if ($role) {
                    if ($user) {
                        // Check if user is alreaady associated with Union
                        if (UnionUserRole::where("user_id", $user->id)->where("union_id", $union_branch->union_id)->exists()){
                            $this->response["message"] = "This user has already been added to this Union Branch!";
                        }
                        else {
                            UnionUserRole::create([
                                "user_id" => $user->id,
                                "role_id" => $role->id,
                                "union_id" => $union_branch->union_id,
                                "branch_id" => $union_branch->id,
                                "status" => "active",
                            ]);

                            $this->response["message"] = "User has been added to this Union successfully!";
                            $this->response["status"] = Response::HTTP_OK;

                            send_outgoing_email_invite($request->email, "simple-invite", $union_branch->name, ($role->display_name ?? $role->name));
                            $notification_message = trim($request->user()->first_name.' '.$request->user()->last_name)." ".$role_appended." added you as a $role->display_name to $union_branch->name ";
                            record_notification_for_users($notification_message, $user->id, "single", request()->user()->id);
                        }
                    }
                    else {
                        if (EmailInvitations::where("email", $request->email)->where("union_id", $union_branch->id)->exists()) {
                            $this->response["message"] = "An invite has already been sent to this email to join this Union!";
                        }
                        else {
                            $url_token = sha1(uniqid($request->email));
                            EmailInvitations::create([
                                "email" => $request->email,
                                "token" => $url_token,
                                "role_id" => $role->id,
                                "union_id" => $union_branch->union_id,
                                "union_branch_id" => $union_branch->id,
                                "invited_by" => $request->user()->id,
                            ]);

                            $this->response["message"] = "An invite has been successfully sent to this user to join this Union Branch!";
                            $this->response["status"] = Response::HTTP_OK;

                            send_outgoing_email_invite($request->email, "invite-with-link", $union_branch->name, ($role->display_name ?? $role->name), $url_token);
                            $notification_message = trim($request->user()->first_name.' '.$request->user()->last_name)." ".$role_appended." added you as a $role->display_name to $union_branch->name ";
                            record_notification_for_users($notification_message, $request->email, "single", request()->user()->id);
                        }
                    }
                }
                else {
                    $this->response["message"] = "The role you have selected does not match our records!";
                }
            }
            else {
                $this->response["message"] = "The union branch you have selected does not match our records!";
            }
        } catch (\Throwable $th) {
            $this->response["status"] = Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->response["message"] = "We are experiencing some troubles create this union at this time. Please try again or contact Tech Support for help";
            $this->response["exception"] = $th->getMessage();
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_admins($branch)
    {
        $union_branch = UnionBranch::find($branch);
        $data = [];

        if ($union_branch) {
            if ($union_branch->users->count()) {
                foreach ($union_branch->users as $assigned_user) {
                    $user_deets = $assigned_user->user;
                    if ($user_deets) {
                        $data[] = [
                            "_id" => $assigned_user->id,
                            "name" => trim(($user_deets->last_name ?? "").' '.($user_deets->first_name ?? "")),
                            "photo" => get_model_file_from_disk(($user_deets->display_picture ?? ""), "profile_photos"),
                            "role" => $assigned_user->role->display_name ?? "",
                            "email" => $user_deets->email,
                            "status" => $assigned_user->status,
                            "date_joined" => $assigned_user->updated_at->format("j F Y"),
                        ];
                    }
                }
            }

            $this->response["message"] = "Union Branch Admins Retrieved";
            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
        }
        else {
            $this->response["message"] = "We could not locate the union you have requested its information";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function remove_admin(Request $request, $branch)
    {
        $union_branch = UnionBranch::find($branch);

        if ($union_branch) {
            if ($remove_admin = $union_branch->users->where("id", $request->admin_id)->first()) {
                if ($remove_admin->delete()) {
                    $this->response["message"] = "Union Branch Admin has been removed successfully!";
                    $this->response["status"] = Response::HTTP_OK;
                }
            }
            else {
                $this->response["message"] = "We could not locate the admin you have made an attempt to delete.";
            }
        }
        else {
            $this->response["message"] = "We could not locate the union you have requested its information";
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
