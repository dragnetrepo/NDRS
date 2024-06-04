<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Http\Requests\User\SendMessageRequest;
use App\Models\CaseUserRoles;
use App\Models\EmailInvitations;
use App\Models\SettlementBodyMember;
use App\Models\SupportMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
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

    public function index(Request $request)
    {
        $user = $request->user();
        $data = [
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "middle_name" => $user->middle_name,
            "email" => $user->email,
            "phone" => $user->phone,
            "display_picture" => get_model_file_from_disk($user->display_picture ?? "", "profile_photos"),
            "contact_address" => $user->contact_address,
            "user_role" => get_user_roles($user)
        ];

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Profile information retrieved!";
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            "first_name" => "required|string|min:3|max:191",
            "middle_name" => "nullable|string|min:3|max:191",
            "last_name" => "required|string|min:3|max:191",
            "email" => "required|string|unique:users,email,".$user->id,
            "phone" => "required|string|unique:users,phone,".$user->id,
            "contact_address" => "nullable|string|max:191",
            "display_picture" => "nullable|mimes:png,jpg|max:2048"
        ]);

        if ($validator->fails()) {
            $this->response["message"] = "Validation errors!";
            $this->response["error"] = $validator->errors();
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }
        else {

            $file_name = $user->display_picture;

            if ($request->hasFile("display_picture")) {
                // This file
                $file_name = sha1(time().$user->id).'.'.$request->file('display_picture')->getClientOriginalExtension();
                $request->file('display_picture')->storeAs("", $file_name, ['disk' => 'profile_photos']);
            }

            User::where("id", $user->id)->update([
                "first_name" => $request->first_name,
                "middle_name" => $request->middle_name ?? '',
                "last_name" => $request->last_name,
                "phone" => $request->phone,
                "email" => $request->email,
                "display_picture" => $file_name,
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Profile information has been updated successfully!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function get_roles()
    {
        $roles = Role::get();
        $data = [];

        if ($roles->isNotEmpty()) {
            foreach ($roles as $role) {
                $data["roles"][] = [
                    "role_id" => $role->id,
                    "role_name" => $role->name,
                ];
            }
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Fetched all roles!";
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $user = $request->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            $this->response["message"] = "Password has been updated successfully!";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["error"] = [
                "old_password" => ["The password is incorrect"]
            ];
            $this->response["message"] = "Validation errors";
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        if (Hash::check($request->password, $user->password)) {
            EmailInvitations::where("email", $user->email)->delete();
            CaseUserRoles::where("email", $user->email)->delete();
            SettlementBodyMember::where("email", $user->email)->delete();

            $user->tokens()->delete();
            $user->email = time().'__'.$user->email;
            $user->delete();

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Account has been deleted successfully!";
        }
        else {
            $this->response["message"] = "The password is incorrect";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function send_message(SendMessageRequest $request)
    {
        $form_error_msg = [];
        $user = $request->user();
        // Confirm user has role

        $has_role = $user->roles->where("id", $request->role_id)->first();

        if ($has_role) {
            SupportMessage::create([
                "user_id" => $request->user()->id,
                "role_id" => $request->role_id,
                "union_id" => $request->union_id ?? 0,
                "union_branch" => $request->union_branch ?? 0,
                "sub_branch" => $request->sub_branch ?? 0,
                "full_name" => $request->full_name,
                "email" => $request->email,
                "message" => $request->message,
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Your message has been sent successfully!";
        }
        else {
            $form_error_msg["role_id"] = ["You currently do have this role"];
        }


        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
