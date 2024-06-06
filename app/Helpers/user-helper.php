<?php

use App\Models\CaseDiscussion;
use App\Models\CaseDispute;
use App\Models\CaseFolder;
use App\Models\CaseUserRoles;
use App\Models\Notification;
use App\Models\OutgoingMessages;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

if (!function_exists("get_user_roles")) {
    function get_user_roles($user) {
        $roles_collection = [];

        if ($user->hasAnyRole()) {
            if ($user->member_role->isNotEmpty()) {
                foreach ($user->member_role as $key => $role) {
                    $roles_collection[$key] = [
                        "role_id" => $role->role_id,
                        "role_name" => $role->role->name,
                    ];

                    if ($role->union) {
                        $roles_collection[$key]["union_id"] = $role->union->id;
                        $roles_collection[$key]["union_name"] = $role->union->name;
                    }

                    if ($role->union_branch) {
                        $roles_collection[$key]["union_branch_id"] = $role->union_branch->id;
                        $roles_collection[$key]["union_branch_name"] = $role->union_branch->name;
                    }

                    if ($role->union_sub_branch) {
                        $roles_collection[$key]["union_sub_branch_id"] = $role->union_sub_branch->id;
                        $roles_collection[$key]["union_sub_branch_name"] = $role->union_sub_branch->name;
                    }
                }
            }
        }

        return $roles_collection;
    }
}

if (!function_exists("login_user_token")) {
    function login_user_token($user) {
        return $user->createToken('authToken', ['navigate-app'])->plainTextToken;
    }
}

if (!function_exists("get_user_settings_value")) {
    function get_user_settings_value(User $user, string $setting, string $option = "email") {
        $settings = $user->settings;

        if ($settings) {
            if ($settings->value) {
                $settings_record = $settings->value;

                if ($setting == "2fa") {
                    if (isset($settings_record[$setting])) {
                        return $settings_record[$setting]["value"] ?? "0";
                    }
                }
                else {
                    if (isset($settings_record[$setting])) {
                        return $settings_record[$setting]["settings"][$option] ?? "0";
                    }
                }
            }
        }

        return false;
    }
}

if (!function_exists("get_user_settings")) {
    function get_user_settings(User $user) {
        if ($user) {
            $settings = Settings::where("user_id", $user->id)->first();

            if ($settings) {
                if ($settings->value) {
                    return $settings->value;
                }
            }
            else {
                Settings::create([
                    "user_id" => $user->id,
                    "value" => Settings::ALL_SETTINGS,
                ]);

                return Settings::ALL_SETTINGS;
            }
        }

        return false;
    }
}

if (!function_exists("reset_user_settings")) {
    function reset_user_settings(User $user) {
        if ($user) {
            $settings = get_user_settings($user);
            $all_settings = Settings::ALL_SETTINGS;

            if ($settings) {
                $settings_record = $settings;
                foreach ($all_settings as $key => $information) {
                    if (isset($settings_record[$key])) {
                        $settings_record[$key]["name"] = $all_settings[$key]["name"];
                        $settings_record[$key]["description"] = $all_settings[$key]["description"];

                        if (isset($all_settings[$key]["settings"])) {
                            foreach ($all_settings[$key]["settings"] as $option => $value) {
                                if (!isset($settings_record[$key]["settings"][$option])) {
                                    $settings_record[$key]["settings"][$option] = $value;
                                }
                            }

                            foreach ($settings_record[$key]["settings"] as $option => $user_value) {
                                if (!isset($all_settings[$key]["settings"][$option])) {
                                    unset($settings_record[$key]["settings"][$option]);
                                }
                            }
                        }
                    }
                    else {
                        $settings_record[$key] = $information;
                    }
                }

                Settings::where("user_id", $user->id)->update([
                    "value" => $settings_record
                ]);
            }
        }
    }
}

if (!function_exists("update_user_setting")) {
    function update_user_setting(User $user, string $setting, string $option = "") {
        if ($user) {
            $settings = get_user_settings($user);

            if ($settings) {
                if (isset($settings[$setting])) {
                    if (isset($settings[$setting]["settings"][$option])) {
                        $settings[$setting]["settings"][$option] = $settings[$setting]["settings"][$option] ? "0" : "1";
                    }
                    elseif (isset($settings[$setting]["value"])) {
                        $settings[$setting]["value"] = $settings[$setting]["value"] ? "0" : "1";
                    }

                    Settings::where("user_id", $user->id)->update([
                        "value" => $settings
                    ]);

                    return true;
                }
            }
        }

        return false;
    }
}

if (!function_exists("get_case_dispute")) {
    function get_case_dispute($case_id = 0, $user_id = 0, $status = "") {
        if ($user_id) {
            $role = request()->user()->roles->first();

            if ($role->hasPermissionTo("approve dispute")) {
                $user_id = 0;
            }
        }

        $disputes = CaseDispute::where(function($query) use ($user_id) {
            $query->when($user_id, function($query) use ($user_id) {
                $query->where("created_by", $user_id)
                ->orWhereHas('union_data.users', function ($query) use ($user_id) {
                    $query->where("user_id", $user_id);
                })->orWhereHas('involved_parties', function ($query) use ($user_id) {
                    $query->where("user_id", $user_id);
                });
            });
        })
        ->when($status, function($query) use ($status) {
            $query->where("status", $status);
        })
        ->whereHas('union_data');

        if ($case_id) {
            $disputes = $disputes->where("id", $case_id)->first();
        }
        else {
            $disputes = $disputes->get();
        }

        return $disputes;
    }
}

if (!function_exists("create_dispute_group")) {
    function create_dispute_group(CaseDispute $dispute) {
        if (!CaseDiscussion::where("case_id", $dispute->id)->exists()) {
            CaseDiscussion::create([
                "case_id" => $dispute->id,
                "title" => $dispute->case_no." Main Chat (".($dispute->union_data->acronym ?? $dispute->union_data->name)." vs ".($dispute->accused->union->acronym ?? $dispute->accused->union->name).")",
                "type" => "group"
            ]);
        }

        return true;
    }
}

if (!function_exists("create_dispute_folder")) {
    function create_dispute_folder(CaseDispute $dispute) {
        if (!CaseFolder::where("case_id", $dispute->id)->where("is_default", true)->exists()) {
            CaseFolder::create([
                "case_id" => $dispute->id,
                "folder_name" => $dispute->case_no." ".$dispute->case_title,
                "is_default" => true,
            ]);
        }

        return true;
    }
}

if (!function_exists("get_dispute_folder")) {
    function get_dispute_folder(CaseDispute $dispute) {
        $folder = CaseFolder::where("case_id", $dispute->id)->where("is_default", true)->first();
        if (!$folder) {
            create_dispute_folder($dispute);

            return get_dispute_folder($dispute);
        }

        return $folder;
    }
}

if (!function_exists("send_out_case_invitation")) {
    function send_out_case_invitation($case_id, $user_id, $user_email, $role_name) {
        $outgoing_messages = new OutgoingMessages();

        $subject = "New Invite to contribute to CASE $case_id";
        $message_body = "<p>Hello there,";
        $message_body .= "<p>We hope this email finds you well.</p>";
        $message_body .= "<p>You have been invited as a $role_name for CASE $case_id. Kindly login to your NDRS dashboard to accept this invite to be part of this dispute as a $role_name.</p>";
        $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = false;
        if ($message_body) {
            $message_sent = $outgoing_messages->send_message($user_id, $user_email, "case-dispute-role-invite", "email", $subject, $message_body);
        }

        return $message_sent;
    }
}

if (!function_exists("send_out_board_member_invitation")) {
    function send_out_board_member_invitation($board_name, $user_id, $user_email) {
        $outgoing_messages = new OutgoingMessages();

        $subject = "New Invite to be a part of $board_name";
        $message_body = "<p>Hello there,";
        $message_body .= "<p>We hope this email finds you well.</p>";
        $message_body .= "<p>You have been invited to be a part of $board_name as a board member.</p>";
        $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = false;
        if ($message_body) {
            $message_sent = $outgoing_messages->send_message($user_id, $user_email, "board-member-invite", "email", $subject, $message_body);
        }

        return $message_sent;
    }
}

if (!function_exists("send_outgoing_email_invite")) {
    function send_outgoing_email_invite($email, $type, $union_name, $role, $url_token="", $subject="") {
        $message_body = "";
        $purpose = "";
        $outgoing_messages = new OutgoingMessages();
        if (!$subject) {
            $subject = "New Invite from $union_name";
        }
        $data = [
            "union_name" => $union_name,
            "role" => $role,
            "type" => $type,
            "email" => $email,
            "url_token" => $url_token,
        ];

        if ($type == "simple-invite") {
            $purpose = "Invite for Account Holder";
            $message_body = (string) View::make('email-templates.simple-invite', $data);
        }
        elseif ($type == "invite-with-link") {
            $purpose = "Invite for non Account Holder";
            $message_body = (string) View::make('email-templates.invite-with-link', $data);
        }

        $message_sent = false;
        if ($message_body) {
            $message_sent = $outgoing_messages->send_message(0, $email, $purpose, "email", $subject, $message_body);
        }

        return $message_sent;
    }
}

if (!function_exists("user_has_permission")) {
    function user_has_permission($permission_name) {
        $role = request()->user()->roles->first();

        return $role->hasPermissionTo($permission_name);
    }
}

if (!function_exists("user_is_admin")) {
    function user_is_admin() {
        return request()->user()->roles->where("id", "1")->first();
    }
}

if (!function_exists("get_model_file_from_disk")) {
    function get_model_file_from_disk($file_path, $disk) {
        if ($file_path) {
            try {
                if (Storage::disk($disk)->exists($file_path)) {
                    return Storage::disk($disk)->url($file_path);
                }
            } catch (FileNotFoundException $e) {
                return '';
            }
        }

        return '';
    }
}

if (!function_exists("record_notification_for_users")) {
    function record_notification_for_users(string $message, string $action_id, string $action_type, int $triggered_by) {
        if ($action_type == "case") {
            // Notify all ministry admins
            $admins = User::whereHas('roles', function($query){
                $query->where("name", "ministry admin");
            })->get();

            if ($admins->isNotEmpty()) {
                foreach ($admins as $admin) {
                    Notification::create([
                        "user_id" => $admin->id,
                        "triggered_by" => $triggered_by,
                        "message" => $message,
                    ]);
                }
            }

            // Get all involved in the case
            $case_dispute = get_case_dispute($action_id);

            if ($case_dispute) {
                $users = $case_dispute->involved_parties;

                if ($users->count()) {
                    foreach ($users as $user) {
                        Notification::create([
                            "user_id" => $user->user_id,
                            "email" => $user->email,
                            "triggered_by" => $triggered_by,
                            "message" => $message,
                        ]);
                    }
                }
            }
        }
        elseif ($action_type == "single") {
            Notification::create([
                "user_id" => (is_numeric($action_id)) ? $action_id : 0,
                "email" => (!is_numeric($action_id)) ? $action_id : "",
                "triggered_by" => $triggered_by,
                "message" => $message,
            ]);
        }
    }
}

if (!function_exists("get_user_notifications")) {
    function get_user_notifications($all_cases = false, $is_read = "all", $case_id = 0, $perPage = 50) {
        return Notification::where(function($query){
            $query->where("user_id", request()->user()->id)->orwhere("email", request()->user()->email);
        })
        ->when(($case_id > 0), function($query) use ($case_id) {
            $query->where("case_id", $case_id);
        })
        ->when($all_cases, function($query) {
            $query->where("case_id", ">", 0);
        })
        ->when(($is_read != "all"), function($query) use ($is_read) {
            if ($is_read == "pending") {
                $query->where("is_read", false);
            }
            else {
                $query->where("is_read", true);
            }
        })
        ->orderBy("created_at", "asc")
        ->paginate($perPage);
    }
}
