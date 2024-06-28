<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\User\OrganizationProfileRequest;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Http\Requests\User\SendMessageRequest;
use App\Models\CaseUserRoles;
use App\Models\EmailInvitations;
use App\Models\SettlementBodyMember;
use App\Models\SupportMessage;
use App\Models\Union;
use App\Models\UnionBranch;
use App\Models\UnionSubBranch;
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
                "name" => trim($request->first_name.' '.($request->middle_name ?? "").' '.$request->last_name),
                "phone" => $request->phone,
                "email" => $request->email,
                "contact_address" => $request->contact_address,
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
        SupportMessage::create([
            "user_id" => $request->user()->id,
            "full_name" => $request->full_name,
            "email" => $request->email,
            "message" => $request->message,
        ]);

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Your message has been sent successfully!";

        return response()->json($this->response, $this->response["status"]);
    }

    public function organization_profile(Request $request)
    {
        $role = (object) get_user_roles($request->user());
        $organization = $disk_name = null;

        if ($role) {
            if ($role->union_sub_branch_id) {
                $organization = UnionSubBranch::find($role->union_sub_branch_id);
                $disk_name = "union_sub_branch_logos";
            }
            elseif ($role->union_branch_id) {
                $organization = UnionBranch::find($role->union_branch_id);
                $disk_name = "union_branch_logos";
            }
            elseif ($role->union_id) {
                $organization = Union::find($role->union_branch_id);
                $disk_name = "union_logos";
            }

            if ($organization) {
                $this->response["data"] = [
                    "_id" => $organization->id,
                    "name" => $organization->name,
                    "acronym" => $organization->acronym,
                    "about" => $organization->description,
                    "phone" => $organization->phone,
                    "industry_id" => $organization->industry->id ?? "",
                    "industry" => $organization->industry->name ?? "",
                    "headquarters" => $organization->headquarters,
                    "founded_in" => $organization->founded_in,
                    "logo" => get_model_file_from_disk($organization->logo, $disk_name),
                ];
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Organization profile information retrieved successfully!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function update_organization_profile(OrganizationProfileRequest $request)
    {
        $role = (object) get_user_roles($request->user());
        $organization = $disk_name = null;

        if ($role) {
            if ($role->union_sub_branch_id) {
                $organization = UnionSubBranch::find($role->union_sub_branch_id);
                $disk_name = "union_logos";
            }
            elseif ($role->union_branch_id) {
                $organization = UnionBranch::find($role->union_branch_id);
                $disk_name = "union_branch_logos";
            }
            elseif ($role->union_id) {
                $organization = Union::find($role->union_branch_id);
                $disk_name = "union_logos";
            }

            if ($organization) {
                if (isset($organization->name)) {
                    $organization->name = $request->name;
                }

                if (isset($organization->acronym)) {
                    $organization->acronym = $request->acronym;
                }

                if (isset($organization->industry_id)) {
                    $organization->industry_id = $request->industry_id;
                }

                if (isset($organization->headquarters) && $request->headquarters) {
                    $organization->headquarters = $request->headquarters;
                }

                if (isset($organization->phone) && $request->phone) {
                    $organization->phone = $request->phone;
                }

                if (isset($organization->about) && $request->about) {
                    $organization->about = $request->about;
                }

                if (isset($organization->founded_in) && $request->founded_in) {
                    $organization->founded_in = $request->founded_in;
                }

                if ($request->hasFile("logo")) {
                    // This file
                    $file_name = sha1(time().$organization->id).'.'.$request->file('logo')->getClientOriginalExtension();
                    $request->file('logo')->storeAs("", $file_name, ['disk' => $disk_name]);

                    if ($file_name) {
                        $organization->logo = $file_name;
                    }
                }

                if ($organization->save()) {
                    $this->response["status"] = Response::HTTP_OK;
                    $this->response["message"] = "Organization profile information has been updated successfully!";
                }
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
