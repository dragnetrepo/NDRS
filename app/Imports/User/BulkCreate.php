<?php

namespace App\Imports\User;

use App\Models\EmailInvitations;
use App\Models\UnionUserRole;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Spatie\Permission\Models\Role;

class BulkCreate implements ToCollection
{
    public $response;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows): array
    {
        $error_msg = [];
        $this->response =  [
            "data" => [],
            "error" => [],
        ];

        $curr_user_role = UnionUserRole::where("user_id", request()->user()->id)->first();

        $role_appended = "";

        if ($curr_user_role) {
            $role_appended = "(".$curr_user_role->role->name.")";
        }

        if ($rows->isNotEmpty()) {
            foreach ($rows as $key => $line) {
                if ($key == 0) {
                    //  Validate headings
                    if (strtolower($line[0]) != "email") {
                        $error_msg[] = ["First column name must be email"];
                    }

                    if (strtolower($line[1]) != "role") {
                        $error_msg[] = ["Second column name must be role"];
                    }

                    if (count($error_msg)) {
                        $this->response["error"] = $error_msg;
                    }
                }
                else {
                    if (empty($error_msg)) {
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
                                        $url_token = sha1(uniqid($user_email));

                                        $db_user = EmailInvitations::create([
                                            "email" => $user_email,
                                            "token" => $url_token,
                                            "role_id" => $role->id,
                                            "invited_by" => request()->user()->id,
                                        ]);

                                        send_outgoing_email_invite($user_email, "simple-invite", "NDRS", ($role->display_name ?? $role->name), $url_token, "You have been invited by NDRS", "later");
                                        $notification_message = trim(request()->user()->first_name.' '.request()->user()->last_name)." ".$role_appended." invited you as a $role->display_name to NDRS";
                                        record_notification_for_users($notification_message, $user_email, "single", request()->user()->id);
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
                                $this->response["data"][] = [
                                    "email" => $db_user->email,
                                    "role" => $user_role,
                                    "message" => $message,
                                ];
                            }
                        }
                    }
                }
            }
        }
        else {
            $this->response["error"] = ["You have uploaded an empty excel file. Please check and try again"];
        }

        return $this->response;
    }
}
