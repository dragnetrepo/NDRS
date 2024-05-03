<?php

namespace App\Http\Controllers\Api\Union;

use App\Http\Controllers\Controller;
use App\Http\Requests\Union\CreateUnionRequest;
use App\Http\Requests\Union\SendUnionInviteRequest;
use App\Models\EmailInvitations;
use App\Models\OutgoingMessages;
use App\Models\Union;
use App\Models\UnionUserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UnionController extends Controller
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

    public function index(Request $request)
    {
        $data = [];
        $unions = Union::get();
        $this->response["message"] = "No data found";

        // $roles = [
        //     "Ministry Admin",
        //     "National Union Admin",
        //     "Union Branch Admin",
        //     "Union Members",
        // ];

        // foreach ($roles as $role) {
        //     Role::create([
        //         "name" => $role
        //     ]);
        // }

        if ($unions->isNotEmpty()) {
            foreach ($unions as $union) {
                $data[] = [
                    "id" => $union->id,
                    "name" => $union->name,
                    "acronym" => $union->acronym,
                    "logo" => $union->logo ? asset('/union/logos/'.$union->logo) : '',
                ];
            }

            $this->response["message"] = "Retrieved Union list";
            $this->response["status"] = Response::HTTP_OK;
        }

        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function read($union)
    {
        $union = Union::find($union);

        if ($union) {
            $this->response["data"] = [
                "_id" => $union->id,
                "name" => $union->name,
                "acronym" => $union->acronym,
                "description" => $union->description,
                "phone" => $union->phone,
                "industry" => $union->industry,
                "headquarters" => $union->headquarters,
                "founded_in" => $union->founded_in,
                "logo" => $union->logo ? asset($union->logo) : '',
            ];
            $this->response["message"] = "Union Information Retrieved";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "We could not locate the union you are looking for!";
            $this->response["status"] = Response::HTTP_NOT_FOUND;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function create(CreateUnionRequest $request)
    {
        $user = $request->user();
        try {
            $file_name = "";
            if ($request->hasFile("logo")) {
                // This file
                $file_name = sha1(time().$user->id).'.'.$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->storeAs("", $file_name, ['disk' => 'union_logos']);
            }

            Union::create([
                "name" => $request->name,
                "acronym" => $request->acronym ?? '',
                "founded_in" => $request->founded_in,
                "phone" => $request->phone,
                "headquarters" => $request->headquarters,
                "industry" => $request->industry,
                "description" => $request->about,
                "logo" => $file_name,
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Union has been created successfully!";
        } catch (\Throwable $th) {
            $this->response["status"] = Response::HTTP_INTERNAL_SERVER_ERROR;
            $this->response["message"] = "We are experiencing some troubles create this union at this time. Please try again or contact Tech Support for help";
            $this->response["exception"] = $th->getMessage();
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function edit(CreateUnionRequest $request, $union)
    {
        $user = $request->user();
        $union = Union::find($union);

        if ($union) {
            $union->name = $request->name;
            $union->acronym = $request->acronym ?? '';
            $union->industry = $request->industry;
            $union->headquarters = $request->headquarters;
            $union->phone = $request->phone;
            $union->description = $request->about;
            $union->founded_in = $request->founded_in;
            $file_name = $union->logo;
            if ($request->hasFile("logo")) {
                // This file
                $file_name = sha1(time().$user->id).'.'.$request->file('logo')->getClientOriginalExtension();
                $request->file('logo')->storeAs("", $file_name, ['disk' => 'union_logos']);
            }

            $union->logo = $file_name;
            if ($union->save()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Union has been edited successfully!";
            }
            else {
                $this->response["message"] = "We could not complete your request at this time. Please try again!";
            }
        }
        else {
            $this->response["message"] = "The selected union does not match our records!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function delete($union)
    {
        $union = Union::find($union);

        if ($union) {
            if ($union->delete()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Union has been deleted successfully!";
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

    public function send_invite(SendUnionInviteRequest $request, $union)
    {
        try {
            // Check if user has an account to be added as an admin
            $user = User::where("email", $request->email)->first();
            $role = Role::find($request->role);
            $union = Union::find($union);

            if ($union) {
                if ($role) {
                    if ($user) {
                        // Check if user is alreaady associated with Union
                        if (UnionUserRole::where("user_id", $user->id)->where("union_id", $union->id)->exists()){
                            $this->response["message"] = "This user has already been added to this Union!";
                        }
                        else {
                            UnionUserRole::create([
                                "user_id" => $user->id,
                                "role_id" => $role->id,
                                "union_id" => $union->id,
                                "status" => "active",
                            ]);

                            $this->response["message"] = "User added to this Union successfully!";
                            $this->response["status"] = Response::HTTP_OK;

                            $this->sendOutgoingEmailInvites($request->email, "simple-invite", $union->name, $role->name);
                        }
                    }
                    else {
                        if (EmailInvitations::where("email", $request->email)->where("union_id", $union->id)->exists()) {
                            $this->response["message"] = "An invite has already been sent to this email to join this Union!";
                        }
                        else {
                            $url_token = sha1(uniqid($request->email));
                            EmailInvitations::create([
                                "email" => $request->email,
                                "token" => $url_token,
                                "role_id" => $role->id,
                                "union_id" => $union->id,
                                "invited_by" => $request->user()->id,
                            ]);

                            $this->response["message"] = "An invite has been successfully sent to this user to join this Union!";
                            $this->response["status"] = Response::HTTP_OK;

                            $this->sendOutgoingEmailInvites($request->email, "invite-with-link", $union->name, $role->name, $url_token);
                        }
                    }
                }
                else {
                    $this->response["message"] = "The role you have selected does not match our records!";
                }
            }
            else {
                $this->response["message"] = "The union you have selected does not match our records!";
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
        $subject = "New Invite from $union_name";

        if ($type == "simple-invite") {
            $message_body = "<p>Hello, there";
            $message_body .= "<p>We hope this email finds you well.</p>";
            $message_body .= "<p>You have just been added as $role for $union_name. Kindly login to your NDRS dashboard to have access to the Union</p>";
            $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
            $message_body .= "<p>Cheers,</p>";
            $message_body .= "<p>".env("APP_NAME")." Team</p>";

            $purpose = "Invite for Account Holder";
        }
        elseif ($type == "invite-with-link") {
            $email_invite_url = url('/union-invite/'.$url_token);
            $message_body = "<p>Hello, there";
            $message_body .= "<p>We hope this email finds you well.</p>";
            $message_body .= "<p>You have just received an invite to join their Union. Click on the URL below to create an account on NDRS and have access to the Union</p>";
            $message_body .= "<p><a href='$email_invite_url'>$email_invite_url</a></p>";
            $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
            $message_body .= "<p>Cheers,</p>";
            $message_body .= "<p>".env("APP_NAME")." Team</p>";

            $purpose = "Invite for non Account Holder";
        }

        $message_sent = false;
        if ($message_body) {
            $message_sent = $this->outgoing_messages->send_message(0, $email, $purpose, "email", $subject, $message_body);
        }

        return $message_sent;
    }
}
