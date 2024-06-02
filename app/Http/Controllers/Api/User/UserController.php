<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\General\CsvFileValidateRequest;
use App\Http\Requests\User\InviteUserRequest;
use App\Http\Requests\User\ReferCaseRequest;
use App\Models\CaseDispute;
use App\Models\CaseUserRoles;
use App\Models\EmailInvitations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\OutgoingMessages;
use App\Models\SettlementBody;
use App\Models\SettlementBodyMember;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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

    public function index($role="")
    {
        $users = User::whereHas('roles', function($query) use ($role) {
            $query->when($role, function($query) use ($role) {
                $query->where("id", $role);
            });
        })->get();

        $data = [];
        $this->response["message"] = "No data found";

        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                $role_name = "";
                $role = $user->roles->first();

                if ($role) {
                    $role_name = $role->display_name;
                    if ($role->name == "board of enquiry") {
                        $role_name .= " Member";
                    }
                }

                $data[$role_name][] = [
                    "_id" => $user->id,
                    "name" => trim($user->first_name.' '.$user->last_name),
                    "status" => $user->status,
                    "date_added" => $user->created_at->format("M d Y"),
                    "photo" => get_model_file_from_disk($user->display_picture ?? "", "profile_photos"),
                    "assigned_cases" => $user->disputes->count()
                ];
            }

            $this->response["message"] = "Users list retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function send_invite(InviteUserRequest $request)
    {
        $form_error_msg = [];
        if (!User::where("email", $request->email)->exists()) {
            $case_id = $request->case_id ?? 0;
            if ($request->case_id) {
                if (!CaseDispute::where("id", $request->case_id)->exists()) {
                    $case_id = -1;
                    $form_error_msg["case_id"]= ["Case dispute does not exist in our records"];
                }
            }

            if ($case_id >= 0) {
                $role = Role::find($request->role);

                $url_token = sha1(uniqid($request->email));

                if (!EmailInvitations::where("email", $request->email)->exists()) {
                    EmailInvitations::create([
                        "email" => $request->email,
                        "token" => $url_token,
                        "role_id" => $request->role,
                        "invited_by" => $request->user()->id,
                    ]);

                    if ($case_id > 0) {
                        CaseUserRoles::create([
                            "case_id" => $case_id,
                            "case_role_id" => $request->role,
                            "email" => $request->email,
                        ]);
                    }

                    send_outgoing_email_invite($request->email, "invite-with-link", "NDRS", ($role->display_name ?? $role->name), $url_token, "You have been invited by NDRS");

                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["message"] = "Invite has been sent to this user successfully!";
                }
                else {
                    $form_error_msg["email"]= ["Invite has already been sent to this user"];
                }
            }
        }
        else {
            $form_error_msg["email"]= ["Email has already been registered on this platform"];
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function bulk_send_invite(CsvFileValidateRequest $request)
    {
        $csvFile = fopen($request->file("file"), 'r');
        $line = fgetcsv($csvFile);
        $error_msg = [];

        if (count($line)) {
            if (strtolower($line[0]) != "email") {
                $error_msg[] = ["First column name must be email"];
            }

            if (strtolower($line[1]) != "role") {
                $error_msg[] = ["Second column name must be role"];
            }
        }

        if (count($error_msg)) {
            $this->response["message"] = "Validation errors!";
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["exception"] = $line[0].' -> '.$line[1];
            $this->response["error"] = $error_msg;
        }
        else {
            $index = 1;
            $data = [];

            do {
                if ($index > 1) {
                    $user_email = $line[0];
                    $user_role = $line[1];
                    $message = "";

                    if ($user_email) {
                        $db_user = User::where("name", $user_email)->first();

                        if (!$db_user) {
                            $db_user = EmailInvitations::where("email", $user_email)->first();

                            if (!$db_user) {
                                $role = Role::where("name", $user_role)->first();

                                if ($role) {
                                    $url_token = sha1(uniqid($request->email));

                                    $db_user = EmailInvitations::create([
                                        "email" => $user_email,
                                        "token" => $url_token,
                                        "role_id" => $role->id,
                                        "invited_by" => $request->user()->id,
                                    ]);

                                    send_outgoing_email_invite($user_email, "simple-invite", "NDRS", ($role->display_name ?? $role->name), $url_token, "You have been invited by NDRS");
                                }
                                else {
                                    $message = "This role does not exist.";
                                }
                            }
                            else {
                                $message = "User has already been invited to create an NDRS account";
                            }
                        }
                        else {
                            $message = "User already has an NDRS account";
                        }

                        if ($db_user) {
                            $data[] = [
                                "email" => $db_user->email,
                                "role" => $user_role,
                                "message" => $message,
                            ];
                        }
                    }
                }
                $index++;
            } while ($line = fgetcsv($csvFile));

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Users has been invited in bulk successfully!";
            $this->response["data"] = $data;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function sample_csv_file()
    {
        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Sample CSV file retrieved";
        $this->response["data"] = [
            "sample_csv" => asset("csv-templates/sample-user-invite-csv.csv")
        ];

        return response()->json($this->response, $this->response["status"]);
    }

    public function refer_case(ReferCaseRequest $request, $user)
    {
        $user = User::find($user);

        if ($user) {
            if ($user->status == "suspended") {
                $this->response["message"] = "A case cannot be referred to a suspended user";
            }
            elseif ($user->status == "deactivated") {
                $this->response["message"] = "This user's account is deactivated and thus cannot have a case referred to them.";
            }
            else {
                try {
                    if ($user_role = $user->roles->first()) {
                        if ($request->cases) {
                            if (is_array($request->cases)) {
                                if (count($request->cases)) {
                                    foreach ($request->cases as $case_id) {
                                        $dispute = get_case_dispute($case_id);

                                        if ($dispute) {
                                            if (!CaseUserRoles::where("user_id", $user->id)->where("case_id", $case_id)->exists()) {
                                                CaseUserRoles::create([
                                                    "case_id" => $case_id,
                                                    "case_role_id" => $user_role->id,
                                                    "user_id" => $user->id,
                                                    "email" => $user->email,
                                                ]);

                                                send_out_case_invitation($dispute->case_no, $user->id, $user->id, $user_role->name);
                                            }
                                        }
                                    }


                                    $this->response["status"] = Response::HTTP_OK;
                                    $this->response["message"] = "User has been referred to selected cases successfully!";
                                }
                            }
                        }
                    }
                    else {
                        $this->response["message"] = "No role has been assigned to this yet.";
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
            }

        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function change_status(Request $request, $user)
    {
        $validator = Validator::make($request->all(), [
            "status" => "required|in:active,suspended,deactivated"
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            $user = User::find($user);
            if ($user) {
                $user->status = $request->status;
                if ($user->save()) {
                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["message"] = "User's status has been changed successfully!";
                }
            }
            else {
                $this->response["message"] = "This user does not exist in our records!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function permissions()
    {
        $data = [];
        $this->response["message"] = "No data found";

        $permissions = Permission::get();

        if ($permissions->isNotEmpty()) {
            foreach ($permissions as $permission) {
                $data[$permission->group][] = [
                    "_id" => $permission->id,
                    "name" => $permission->display_name,
                    "group_desc" => $permission->group_desc,
                ];
            }

            $this->response["message"] = "Permissions retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function restore_role_default(Request $request)
    {
        $role = Role::where("id", $request->role_id)->first();

        if ($role) {
            $permissions = Permission::get();

            if ($permissions->isNotEmpty()) {
                foreach ($permissions as $permission) {
                    if (!$role->hasPermissionTo($permission->name)) {
                        $role->givePermissionTo($permission->name);
                    }
                }

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Default has been restored to this role successfully!!";
            }
            else {
                $this->response["message"] = "We currently cannot assign permissions to this role. Kindly contact Tech Support for help!";
            }
        }
        else {
            $this->response["message"] = "The role selected does not match our records!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function update_role_permission(Request $request)
    {
        $role = Role::where("id", $request->role_id)->first();

        if ($role) {
            $permission = Permission::where("id", $request->permission_id)->first();

            if ($permission) {
                if ($role->hasPermissionTo($permission->name)) {
                    $role->revokePermissionTo($permission->name);
                }
                else {
                    $role->givePermissionTo($permission->name);
                }

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Permission has been updated for this role successfully!!";
            }
            else {
                $this->response["message"] = "We cannot find this permission in our records!";
            }
        }
        else {
            $this->response["message"] = "The role selected does not match our records!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_roles(Request $request)
    {
        $data = [];
        $this->response["message"] = "No data found";

        $roles = Role::get();

        if ($roles->isNotEmpty()) {
            $permissions = Permission::get();

            foreach ($roles as $role) {
                $role_permissions = [];

                foreach ($permissions as $permission) {
                    $role_permissions[$permission->group][] = [
                        "_id" => $permission->id,
                        "name" => $permission->display_name,
                        "has_permission" => $role->hasPermissionTo($permission->name) ? 1 : 0,
                        "group_description" => $permission->group_desc
                    ];
                }

                $data[] = [
                    "_id" => $role->id,
                    "name" => $role->display_name,
                    "permissions" => $role_permissions
                ];
            }

            $this->response["message"] = "Admin roles retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function admin_roles()
    {
        $data = [];
        $this->response["message"] = "No data found";

        $roles = Role::where("type", "admin")->get();

        if ($roles->isNotEmpty()) {
            foreach ($roles as $role) {
                $data[] = [
                    "_id" => $role->id,
                    "name" => $role->display_name,
                ];
            }

            $this->response["message"] = "Admin roles retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function settlement_roles()
    {
        $data = [];
        $this->response["message"] = "No data found";

        $roles = Role::where("type", "settlement-body")->get();

        if ($roles->isNotEmpty()) {
            foreach ($roles as $role) {
                $data[] = [
                    "_id" => $role->id,
                    "name" => $role->display_name,
                ];
            }

            $this->response["message"] = "settlement bodies roles retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function create_role(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:2|unique:roles,name"
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            Role::create([
                "name" => $request->name,
                "display_name" => $request->display_name,
                "is_default" => 0,
                "type" => "admin"
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Custom role has been created successfully!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_board_enquiry()
    {
        $board_of_enquiry = SettlementBody::whereHas('role', function($query){
            $query->where("name", "board of enquiry");
        })->get();

        $data = [];
        $this->response["message"] = "No data found";

        if ($board_of_enquiry->isNotEmpty()) {
            foreach ($board_of_enquiry as $board) {
                $assigned_members = [];
                if ($board->members->count()) {
                    foreach ($board->members as $member) {
                        if ($user = $member->user) {
                            $assigned_members[] = [
                                "photo" => get_model_file_from_disk($user->display_picture ?? "", "profile_photos")
                            ];
                        }
                    }
                }

                $data[] = [
                    "_id" => $board->id,
                    "name" => $board->name,
                    "status" => $board->status,
                    "date_added" => $board->created_at->format("M d Y"),
                    "assigned_cases" => $board->disputes->count(),
                    "assigned_members" => $assigned_members,
                ];
            }

            $this->response["message"] = "Board of enquiry list retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function create_board_enquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|min:3",
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            $role = Role::where("name", "board of enquiry")->where("type", "settlement-body")->first();
            if ($role) {
                SettlementBody::create([
                    "name" => $request->name,
                    "role_id" => $role->id
                ]);

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Board of enquiry has been created successfully!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function refer_case_to_body(ReferCaseRequest $request, $settlement)
    {
        $settlement = SettlementBody::find($settlement);

        if ($settlement) {
            if ($settlement->status == "dissolved") {
                $this->response["message"] = "A case cannot be referred to a dissolved board";
            }
            else {
                try {
                    if ($settlement->role) {
                        if ($request->cases) {
                            if (is_array($request->cases)) {
                                if (count($request->cases)) {
                                    foreach ($request->cases as $case_id) {
                                        $dispute = get_case_dispute($case_id);

                                        if ($dispute) {
                                            if (!CaseUserRoles::where("sb_id", $settlement->id)->where("case_id", $case_id)->exists()) {
                                                CaseUserRoles::create([
                                                    "case_id" => $case_id,
                                                    "case_role_id" => $settlement->role->id,
                                                    "sb_id" => $settlement->id,
                                                ]);
                                            }
                                        }
                                    }


                                    $this->response["status"] = Response::HTTP_OK;
                                    $this->response["message"] = "Board of enquiry has been referred to selected cases successfully!";
                                }
                            }
                        }
                    }
                    else {
                        $this->response["message"] = "No role has been assigned to this yet.";
                    }
                } catch (\Throwable $th) {
                    Log::error($th->getMessage());
                }
            }

        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function body_members($settlement)
    {
        $settlement = SettlementBody::find($settlement);
        $data = [];

        if ($settlement) {
            $members = SettlementBodyMember::where("sb_id", $settlement->id)->get();
            $this->response["message"] = "No data found";

            if ($members->isNotEmpty()) {
                foreach ($members as $member) {
                    $data[] = [
                        "_id" => $member->id,
                        "name" => $member->user ? trim($member->user->first_name.' '.$member->user->last_name) : "",
                        "email" => $member->email,
                        "status" => $member->status,
                        "date_joined" => $member->created_at->format("M d Y"),
                    ];
                }
                $this->response["message"] = "Members retrieved successfully!";
                $this->response["data"] = $data;
            }

            $this->response["status"] = Response::HTTP_OK;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function invite_body_member($settlement, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email"
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {
            $settlement = SettlementBody::find($settlement);

            if ($settlement) {
                if (!SettlementBodyMember::where("sb_id", $settlement->id)->where("email", $request->email)->exists()) {
                    SettlementBodyMember::create([
                        "sb_id" => $settlement->id,
                        "email" => $request->email,
                    ]);

                    send_out_board_member_invitation($settlement->name, 0, $request->email);

                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["emssage"] = "Invite has been sent to member successfully!";
                }
                else {
                    $this->response["message"] = "Validation errors";
                    $this->response["error"] = [
                        "email" => ["This user has already been invited to be a member to this board"]
                    ];
                    $this->response["status"] = Response::HTTP_UNAUTHORIZED;
                }
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function remove_body_member($member)
    {
        $settlement_member = SettlementBodyMember::find($member);

        if ($settlement_member) {
            if ($settlement_member->delete()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["emssage"] = "Member has been removed successfully!!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function dissolve_board_enquiry($settlement)
    {
        $settlement = SettlementBody::find($settlement);

        if ($settlement) {
            $settlement->status = "dissolved";
            if ($settlement->save()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["emssage"] = "Board has been dissolved successfully!!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
