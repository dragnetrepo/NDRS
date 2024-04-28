<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            "display_picture" => $user->display_picture ? asset($user->display_picture) : '',
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
                $request->file('display_picture')->storeAs("profile_photos", $file_name);
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
}
