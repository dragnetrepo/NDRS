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
                                "photo" => $user_deets->display_picture ? asset('/user/images/'.$user_deets->display_picture) : ''
                            ];
                        }
                    }
                }

                $data[] = [
                    "id" => $union_branch->id,
                    "name" => $union_branch->name,
                    "acronym" => $union_branch->acronym,
                    "logo" => $union_branch->logo ? asset('/union_branch/logos/'.$union_branch->logo) : '',
                    "assigned_admins" => $assigned_admins,
                    "date_added" => $union_branch->created_at->format("M d Y"),
                ];
            }

            $this->response["message"] = "Retrieved comprehensive union list";
            $this->response["status"] = Response::HTTP_OK;
        }

        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function read($branch)
    {
        $union_branch = UnionBranch::find($branch);

        if ($union_branch) {
            $this->response["data"] = [
                "_id" => $union_branch->id,
                "union_id" => $union_branch->union_id,
                "name" => $union_branch->name,
                "acronym" => $union_branch->acronym,
                "description" => $union_branch->description,
                "phone" => $union_branch->phone,
                "industry" => $union_branch->industry,
                "headquarters" => $union_branch->headquarters,
                "founded_in" => $union_branch->founded_in,
                "logo" => $union_branch->logo ? asset($union_branch->logo) : '',
            ];
            $this->response["message"] = "Union Branch Information Retrieved";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "We could not locate the union you are looking for!";
            $this->response["status"] = Response::HTTP_NOT_FOUND;
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
                    "founded_in" => $request->founded_in,
                    "industry" => $request->industry,
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
            $union_branch->industry = $request->industry;
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

            if ($union_branch) {
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

                            $this->response["message"] = "User added to this Union successfully!";
                            $this->response["status"] = Response::HTTP_OK;

                            $this->sendOutgoingEmailInvites($request->email, "simple-invite", $union_branch->name, $role->name);
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

                            $this->sendOutgoingEmailInvites($request->email, "invite-with-link", $union_branch->name, $role->name, $url_token);
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

    private function sendOutgoingEmailInvites($email, $type, $union_name, $role, $url_token = "")
    {
        $message_body = "";
        $purpose = "";
        $subject = "New Invite from $union_name Branch";

        $message_body = "<p>Hello, there";
        $message_body .= "<p>We hope this email finds you well.</p>";

        if ($type == "simple-invite") {
            $message_body .= "<p>You have just been added as $role for $union_name Branch. Kindly login to your NDRS dashboard to have access to the Union Team</p>";

            $purpose = "Invite for Account Holder";
        }
        elseif ($type == "invite-with-link") {
            $email_invite_url = url('/union-invite/'.$url_token);
            $message_body .= "<p>You have just received an invite to join their Union Team. Click on the URL below to create an account on NDRS and have access to the Union Team</p>";
            $message_body .= "<p><a href='$email_invite_url'>$email_invite_url</a></p>";

            $purpose = "Invite for non Account Holder";
        }

        $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = false;

        if ($message_body) {
            $message_sent = $this->outgoing_messages->send_message(0, $email, $purpose, "email", $subject, $message_body);
        }

        return $message_sent;
    }
}
