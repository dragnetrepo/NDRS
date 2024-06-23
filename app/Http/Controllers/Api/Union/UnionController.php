<?php

namespace App\Http\Controllers\Api\Union;

use App\Http\Controllers\Controller;
use App\Http\Requests\General\CsvFileValidateRequest;
use App\Http\Requests\Union\CreateUnionRequest;
use App\Http\Requests\Union\SendUnionInviteRequest;
use App\Imports\Union\BulkCreate;
use App\Models\EmailInvitations;
use App\Models\Industry;
use App\Models\OutgoingMessages;
use App\Models\Union;
use App\Models\UnionUserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Maatwebsite\Excel\Facades\Excel;

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

        if ($unions->isNotEmpty()) {
            foreach ($unions as $union) {
                $assigned_admins = [];

                if ($union->users->count()) {
                    foreach ($union->users as $assigned_user) {
                        $user_deets = $assigned_user->user;
                        if ($user_deets) {
                            $assigned_admins = [
                                "photo" => get_model_file_from_disk($user_deets->display_picture, "profile_photos")
                            ];
                        }
                    }
                }

                $data[] = [
                    "_id" => $union->id,
                    "name" => $union->name,
                    "acronym" => $union->acronym,
                    "about" => $union->description,
                    "phone" => $union->phone,
                    "industry_id" => $union->industry->id ?? "",
                    "industry" => $union->industry->name ?? "",
                    "headquarters" => $union->headquarters,
                    "founded_in" => $union->founded_in,
                    "logo" => get_model_file_from_disk($union->logo, "union_logos"),
                    "assigned_admins" => $assigned_admins,
                    "date_added" => $union->created_at->format("M d Y"),
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
                "about" => $union->description,
                "phone" => $union->phone,
                "industry_id" => $union->industry->id ?? "",
                "industry" => $union->industry->name ?? "",
                "headquarters" => $union->headquarters,
                "founded_in" => $union->founded_in,
                "logo" => get_model_file_from_disk($union->logo, "union_logos"),
            ];
            $this->response["message"] = "Union Information Retrieved";
            $this->response["status"] = Response::HTTP_OK;
        }
        else {
            $this->response["message"] = "We could not locate the union you are looking for!";
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
                "industry_id" => $request->industry_id,
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

    public function bulk_create(CsvFileValidateRequest $request)
    {
        $bulk_create = new BulkCreate;

        Excel::import($bulk_create, $request->file('file')->store('temp'));

        $response = $bulk_create->response;

        $this->response["status"] = count($response["error"]) ? Response::HTTP_UNAUTHORIZED : Response::HTTP_OK;
        $this->response["message"] = count($response["error"]) ? "Validation errors" : "Union has been created in bulk successfully!";
        $this->response["data"] = $response["data"];
        $this->response["error"] = $response["error"];

        return response()->json($this->response, $this->response["status"]);
    }

    public function sample_csv_file()
    {
        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Sample CSV file retrieved";
        $this->response["data"] = [
            "sample_csv" => asset("csv-templates/sample-union-invite-csv.csv")
        ];

        return response()->json($this->response, $this->response["status"]);
    }

    public function edit(CreateUnionRequest $request, $union)
    {
        $user = $request->user();
        $union = Union::find($union);

        if ($union) {
            $union->name = $request->name;
            $union->acronym = $request->acronym ?? '';
            $union->industry_id = $request->industry_id;
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
            $curr_user_id = $request->user()->id;

            if ($union) {
                $curr_user_role = UnionUserRole::where("user_id", $curr_user_id)->where("union_id", $union->id)->first();

                $role_appended = "";

                if ($curr_user_role) {
                    $role_appended = "(".$curr_user_role->role->name.")";
                }

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

                            send_outgoing_email_invite($request->email, "simple-invite", $union->name, ($role->display_name ?? $role->name));
                            $notification_message = trim($request->user()->first_name.' '.$request->user()->last_name)." ".$role_appended." added you as a $role->name to $union->name ";
                            record_notification_for_users($notification_message, $user->id, "single", request()->user()->id);
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

                            send_outgoing_email_invite($request->email, "invite-with-link", $union->name, ($role->display_name ?? $role->name), $url_token);
                            $notification_message = trim($request->user()->first_name.' '.$request->user()->last_name)." ".$role_appended." added you as a $role->name to $union->name ";
                            record_notification_for_users($notification_message, $request->email, "single", request()->user()->id);

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

    public function get_admins($union)
    {
        $union = Union::find($union);
        $data = [];

        if ($union) {
            if ($union->users->count()) {
                foreach ($union->users as $assigned_user) {
                    $user_deets = $assigned_user->user;
                    if ($user_deets) {
                        $data[] = [
                            "_id" => $assigned_user->id,
                            "name" => trim($user_deets->last_name.' '.$user_deets->first_name),
                            "photo" => get_model_file_from_disk($user_deets->display_picture, "profile_photos"),
                            "role" => $assigned_user->role->name,
                            "status" => $assigned_user->status,
                            "date_joined" => $assigned_user->updated_at->format("j F Y"),
                        ];
                    }
                }
            }

            $this->response["message"] = "Union Admins Retrieved";
            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
        }
        else {
            $this->response["message"] = "We could not locate the union you have requested its information";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function remove_admin(Request $request, $union)
    {
        $union = Union::find($union);
        $data = [];

        if ($union) {
            if ($remove_admin = $union->users->where("id", $request->admin_id)->first()) {
                if ($remove_admin->delete()) {
                    $this->response["message"] = "Union Admin has been removed successfully!";
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
