<?php

use App\Models\CaseDiscussion;
use App\Models\CaseDiscussionAction;
use App\Models\CaseDiscussionMessage;
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
use Spatie\Permission\Models\Role;

if (!function_exists("get_user_roles")) {
    function get_user_roles($user) {
        $roles_collection = [];
        $fetch_multiple = false;
        $union_set = request()->header("ndrs-union");
        if ($union_set) {
            $member_role = $user->member_role->where("union_id", $union_set);
        }
        else {
            $member_role = $user->member_role;
        }

        if ($member_role->count()) {
            if ($fetch_multiple) {
                foreach ($member_role as $key => $role) {
                    $roles_collection[$key] = [
                        "role_id" => $role->role_id,
                        "role_name" => $role->role->display_name,
                        "union_id" => $role->union->id ?? 0,
                        "union_name" => $role->union->name ?? "",
                        "union_branch_id" => $role->union_branch->id ?? 0,
                        "union_branch_name" => $role->union_branch->name ?? "",
                        "union_sub_branch_id" => $role->union_sub_branch->id ?? 0,
                        "union_sub_branch_name" => $role->union_sub_branch->name ?? "",
                    ];
                }
            }
            else {
                $role = $member_role->first();
                if ($role) {
                    $roles_collection = [
                        "role_id" => $role->role_id,
                        "role_name" => $role->role->display_name,
                        "union_id" => $role->union->id ?? 0,
                        "union_name" => $role->union->name ?? "",
                        "union_branch_id" => $role->union_branch->id ?? 0,
                        "union_branch_name" => $role->union_branch->name ?? "",
                        "union_sub_branch_id" => $role->union_sub_branch->id ?? 0,
                        "union_sub_branch_name" => $role->union_sub_branch->name ?? "",
                    ];
                }
            }
        }

        return $roles_collection;
    }
}

if (!function_exists("get_user_permissions")) {
    function get_user_permissions($user) {
        $permissions_collection = [];
        $fetch_multiple = false;
        $union_set = request()->header("ndrs-union");
        if ($union_set) {
            $member_role = $user->member_role->where("union_id", $union_set);
        }
        else {
            $member_role = $user->member_role;
        }

        if ($member_role->count()) {
            if ($fetch_multiple) {
                foreach ($member_role as $key => $role) {
                    $find_role = Role::find($role->role_id);

                    if ($find_role) {
                        $permissions = $find_role->permissions;

                        if ($permissions->count()) {
                            foreach ($permissions as $permission) {
                                $permissions_collection[$key][] = $permission->name;
                            }
                        }
                    }
                }
            }
            else {
                $role = $member_role->first();
                if ($role) {
                    $find_role = Role::find($role->role_id);

                    if ($find_role) {
                        $permissions = $find_role->permissions;
                        if ($permissions->count()) {
                                foreach ($permissions as $permission) {
                                $permissions_collection[] = $permission->name;
                            }
                        }
                    }
                }
            }
        }

        return $permissions_collection;
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
            $user = User::find($user_id);
        }
        else {
            $user = request()->user();
        }

        $user_id = $user->id;
        if (user_is_admin($user)) {
            $user_id = 0;
        }

        $disputes = CaseDispute::where(function($query) use ($user_id) {
            $query->when($user_id, function($query) use ($user_id) {
                $query->where("created_by", $user_id)
                ->orWhereHas('union_data.users', function ($query) use ($user_id) {
                    $query->where("user_id", $user_id);
                })->orWhereHas('involved_parties', function ($query) use ($user_id) {
                    $query->where("user_id", $user_id)
                    ->orWhereHas('body_member', function($sub_query) use ($user_id) {
                        $sub_query->where("user_id", $user_id);
                    });
                });
            });
        })
        ->when($status, function($query) use ($status) {
            $query->where("status", $status);
        })
        ->when(request()->union_id, function($query){
            $query->where("union", request()->union_id)->orWhereHas('accused', function($sub_query){
                $sub_query->where("union_id", request()->union_id);
            });
        })
        ->whereHas('union_data')
        ->orderBy("created_at", "desc");

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
    function send_out_case_invitation($case_id, $user_id, $user_email, $role_name, $send_time = "immediate") {
        $outgoing_messages = new OutgoingMessages();
        $user = User::where("email", $user_email)->first();

        $subject = "New Invite to contribute to CASE $case_id";
        $message_body = "<p>Hello there,";
        $message_body .= "<p>We hope this email finds you well.</p>";
        $message_body .= "<p>You have been invited as a $role_name for CASE $case_id. Kindly login to your NDRS dashboard to accept this invite to be part of this dispute as a $role_name.</p>";
        if ($user) {
            $message_body .= "<p>Kindly click <a href='".env("WEBAPP_URL")."/login"."'>here</a> to log into your account and tend to $case_id.</p>";
        }
        else {
            $message_body .= "<p>Kindly click <a href='".env("WEBAPP_URL")."/createAccount"."'>here</a> to create an account and tend to $case_id.</p>";
        }
        $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = false;
        if ($message_body) {
            $message_sent = $outgoing_messages->send_message($user_id, $user_email, "case-dispute-role-invite", "email", $subject, $message_body, $send_time);
        }

        return $message_sent;
    }
}

if (!function_exists("send_out_board_member_invitation")) {
    function send_out_board_member_invitation($board_name, $user_id, $user_email, $send_time = "immediate") {
        $outgoing_messages = new OutgoingMessages();
        $user = User::where("email", $user_email)->first();

        $subject = "New Invite to be a part of $board_name";
        $message_body = "<p>Hello there,";
        $message_body .= "<p>We hope this email finds you well.</p>";
        $message_body .= "<p>You have been invited to be a part of $board_name as a board member.</p>";
        if ($user) {
            $message_body .= "<p>Kindly click <a href='".env("WEBAPP_URL")."/login"."'>here</a> to log into your account and tend to disputes affiliated with $board_name.</p>";
        }
        else {
            $message_body .= "<p>Kindly click <a href='".env("WEBAPP_URL")."/createAccount"."'>here</a> to create an account and tend to disputes affiliated with $board_name.</p>";
        }
        $message_body .= "<p>If you feel this was sent to you in error, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = false;
        if ($message_body) {
            $message_sent = $outgoing_messages->send_message($user_id, $user_email, "board-member-invite", "email", $subject, $message_body, $send_time);
        }

        return $message_sent;
    }
}

if (!function_exists("send_outgoing_email_invite")) {
    function send_outgoing_email_invite($email, $type, $union_name, $role, $url_token="", $subject="", $send_time = "immediate") {
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
            $message_sent = $outgoing_messages->send_message(0, $email, $purpose, "email", $subject, $message_body, $send_time);
        }

        return $message_sent;
    }
}

if (!function_exists("user_has_permission")) {
    function user_has_permission($permission_name) {
        $member_role = request()->user()->member_role->first();

        if ($member_role) {
            $role = Role::find($member_role->role_id);

            if ($role) {
                return $role->hasPermissionTo($permission_name);
            }
        }

        return false;
    }
}

if (!function_exists("user_is_admin")) {
    function user_is_admin(User $user) {
        return $user->member_role->where("role_id", "1")->first();
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
            $admins = User::whereHas('member_role', function($query){
                $query->where("role_id", "1");
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
                Notification::create([
                    "user_id" => $case_dispute->created_by,
                    "email" => "",
                    "triggered_by" => $triggered_by,
                    "message" => $message,
                ]);

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
        ->orderBy("created_at", "desc")
        ->paginate($perPage);
    }
}

if (!function_exists("format_bytes")) {
    function format_bytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // Uncomment one of the following alternatives
        // $bytes /= pow(1024, $pow);
        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . $units[$pow];
    }
}

if (!function_exists('make_slug')) {
    function make_slug(string $string) {
        $string = remove_accents($string);
        $string = symbols_to_words($string);
        $string = strtolower($string); // Force lowercase
        $space_chars = [
            " ", // space
            "…", // ellipsis
            "–", // en dash
            "—", // em dash
            "/", // slash
            "\\", // backslash
            ":", // colon
            ";", // semi-colon
            ".", // period
            "+", // plus sign
            "#", // pound sign
            "~", // tilde
            "_", // underscore
            "|", // pipe
        ];

        foreach($space_chars as $char){
            $string = str_replace($char, '-', $string); // Change spaces to dashes
        }

        // Only allow letters, numbers, and dashes
        $string = preg_replace('/([^a-zA-Z0-9\-]+)/', '', $string);
        $string = preg_replace('/-+/', '-', $string); // Clean up extra dashes

        if(substr($string, -1)==='-') { // Remove - from end
            $string = substr($string, 0, -1);
        }

        if(substr($string, 0, 1)==='-') { // Remove - from start
            $string = substr($string, 1);
        }

        return $string;
    }
}


if (!function_exists('remove_accents')) { /* Check_for "remove_accents" */
    function remove_accents($string) {
        if(!preg_match('/[\x80-\xff]/', $string)) {
            return $string;
        }

        if(seems_utf8($string)) {
            $chars = [
                // Decompositions for Latin-1 Supplement
                chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
                chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
                chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
                chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
                chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
                chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
                chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
                chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
                chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
                chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
                chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
                chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
                chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
                chr(195).chr(159) => 's', chr(195).chr(160) => 'a',
                chr(195).chr(161) => 'a', chr(195).chr(162) => 'a',
                chr(195).chr(163) => 'a', chr(195).chr(164) => 'a',
                chr(195).chr(165) => 'a', chr(195).chr(167) => 'c',
                chr(195).chr(168) => 'e', chr(195).chr(169) => 'e',
                chr(195).chr(170) => 'e', chr(195).chr(171) => 'e',
                chr(195).chr(172) => 'i', chr(195).chr(173) => 'i',
                chr(195).chr(174) => 'i', chr(195).chr(175) => 'i',
                chr(195).chr(177) => 'n', chr(195).chr(178) => 'o',
                chr(195).chr(179) => 'o', chr(195).chr(180) => 'o',
                chr(195).chr(181) => 'o', chr(195).chr(182) => 'o',
                chr(195).chr(182) => 'o', chr(195).chr(185) => 'u',
                chr(195).chr(186) => 'u', chr(195).chr(187) => 'u',
                chr(195).chr(188) => 'u', chr(195).chr(189) => 'y',
                chr(195).chr(191) => 'y',
                // Decompositions for Latin Extended-A
                chr(196).chr(128) => 'A', chr(196).chr(129) => 'a',
                chr(196).chr(130) => 'A', chr(196).chr(131) => 'a',
                chr(196).chr(132) => 'A', chr(196).chr(133) => 'a',
                chr(196).chr(134) => 'C', chr(196).chr(135) => 'c',
                chr(196).chr(136) => 'C', chr(196).chr(137) => 'c',
                chr(196).chr(138) => 'C', chr(196).chr(139) => 'c',
                chr(196).chr(140) => 'C', chr(196).chr(141) => 'c',
                chr(196).chr(142) => 'D', chr(196).chr(143) => 'd',
                chr(196).chr(144) => 'D', chr(196).chr(145) => 'd',
                chr(196).chr(146) => 'E', chr(196).chr(147) => 'e',
                chr(196).chr(148) => 'E', chr(196).chr(149) => 'e',
                chr(196).chr(150) => 'E', chr(196).chr(151) => 'e',
                chr(196).chr(152) => 'E', chr(196).chr(153) => 'e',
                chr(196).chr(154) => 'E', chr(196).chr(155) => 'e',
                chr(196).chr(156) => 'G', chr(196).chr(157) => 'g',
                chr(196).chr(158) => 'G', chr(196).chr(159) => 'g',
                chr(196).chr(160) => 'G', chr(196).chr(161) => 'g',
                chr(196).chr(162) => 'G', chr(196).chr(163) => 'g',
                chr(196).chr(164) => 'H', chr(196).chr(165) => 'h',
                chr(196).chr(166) => 'H', chr(196).chr(167) => 'h',
                chr(196).chr(168) => 'I', chr(196).chr(169) => 'i',
                chr(196).chr(170) => 'I', chr(196).chr(171) => 'i',
                chr(196).chr(172) => 'I', chr(196).chr(173) => 'i',
                chr(196).chr(174) => 'I', chr(196).chr(175) => 'i',
                chr(196).chr(176) => 'I', chr(196).chr(177) => 'i',
                chr(196).chr(178) => 'IJ',chr(196).chr(179) => 'ij',
                chr(196).chr(180) => 'J', chr(196).chr(181) => 'j',
                chr(196).chr(182) => 'K', chr(196).chr(183) => 'k',
                chr(196).chr(184) => 'k', chr(196).chr(185) => 'L',
                chr(196).chr(186) => 'l', chr(196).chr(187) => 'L',
                chr(196).chr(188) => 'l', chr(196).chr(189) => 'L',
                chr(196).chr(190) => 'l', chr(196).chr(191) => 'L',
                chr(197).chr(128) => 'l', chr(197).chr(129) => 'L',
                chr(197).chr(130) => 'l', chr(197).chr(131) => 'N',
                chr(197).chr(132) => 'n', chr(197).chr(133) => 'N',
                chr(197).chr(134) => 'n', chr(197).chr(135) => 'N',
                chr(197).chr(136) => 'n', chr(197).chr(137) => 'N',
                chr(197).chr(138) => 'n', chr(197).chr(139) => 'N',
                chr(197).chr(140) => 'O', chr(197).chr(141) => 'o',
                chr(197).chr(142) => 'O', chr(197).chr(143) => 'o',
                chr(197).chr(144) => 'O', chr(197).chr(145) => 'o',
                chr(197).chr(146) => 'OE',chr(197).chr(147) => 'oe',
                chr(197).chr(148) => 'R',chr(197).chr(149) => 'r',
                chr(197).chr(150) => 'R',chr(197).chr(151) => 'r',
                chr(197).chr(152) => 'R',chr(197).chr(153) => 'r',
                chr(197).chr(154) => 'S',chr(197).chr(155) => 's',
                chr(197).chr(156) => 'S',chr(197).chr(157) => 's',
                chr(197).chr(158) => 'S',chr(197).chr(159) => 's',
                chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
                chr(197).chr(162) => 'T', chr(197).chr(163) => 't',
                chr(197).chr(164) => 'T', chr(197).chr(165) => 't',
                chr(197).chr(166) => 'T', chr(197).chr(167) => 't',
                chr(197).chr(168) => 'U', chr(197).chr(169) => 'u',
                chr(197).chr(170) => 'U', chr(197).chr(171) => 'u',
                chr(197).chr(172) => 'U', chr(197).chr(173) => 'u',
                chr(197).chr(174) => 'U', chr(197).chr(175) => 'u',
                chr(197).chr(176) => 'U', chr(197).chr(177) => 'u',
                chr(197).chr(178) => 'U', chr(197).chr(179) => 'u',
                chr(197).chr(180) => 'W', chr(197).chr(181) => 'w',
                chr(197).chr(182) => 'Y', chr(197).chr(183) => 'y',
                chr(197).chr(184) => 'Y', chr(197).chr(185) => 'Z',
                chr(197).chr(186) => 'z', chr(197).chr(187) => 'Z',
                chr(197).chr(188) => 'z', chr(197).chr(189) => 'Z',

                chr(197).chr(190) => 'z', chr(197).chr(191) => 's',
                // Euro Sign
                chr(226).chr(130).chr(172) => 'E',
                // GBP (Pound) Sign
                chr(194).chr(163) => ''
            ];
            $string = strtr($string, $chars);
        } else {
            // Assume ISO-8859-1 if not UTF-8
            $chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
            .chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
            .chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
            .chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
            .chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
            .chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
            .chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
            .chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
            .chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
            .chr(252).chr(253).chr(255);

            $chars['out'] = 'EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy';
            $string = strtr($string, $chars['in'], $chars['out']);
            $double_chars['in'] = [chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254)];
            $double_chars['out'] = ['OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th'];
            $string = str_replace($double_chars['in'], $double_chars['out'], $string);
        }
        return $string;
    }
} /* End_check for "remove_accents" */

if (!function_exists('seems_utf8')) { /* Check_for "seems_utf8" */
    function seems_utf8($str) {
        $length = strlen($str);

        for ($i=0; $i < $length; $i++) {
            $c = ord($str[$i]);
            if ($c < 0x80) {
                $n = 0; # 0bbbbbbb
            } elseif (($c & 0xE0) == 0xC0) {
                $n=1; # 110bbbbb
            } elseif (($c & 0xF0) == 0xE0) {
                $n=2; # 1110bbbb
            } elseif (($c & 0xF8) == 0xF0) {
                $n=3; # 11110bbb
            } elseif (($c & 0xFC) == 0xF8) {
                $n=4; # 111110bb
            } elseif (($c & 0xFE) == 0xFC) {
                $n=5; # 1111110b
            } else {
                return false; # Does not match any model
            }

            for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80)) {
                    return false;
                }
            }
        }

        return true;
    }
} /* End_check for "seems_utf8" */

if (!function_exists('symbols_to_words')) { /* Check_for "symbols_to_words" */
    function symbols_to_words($output) {
        $output = str_replace('@', ' at ', $output);
        $output = str_replace('%', ' percent ', $output);
        $output = str_replace('&', ' and ', $output);

        return $output;
    }
} /* End_check for "symbols_to_words" */

if (!function_exists("get_last_read_message")) {
    function get_last_read_message($discussion_id, $user_id) {
        $last_read_message = CaseDiscussionAction::where("user_id", $user_id)->where("cd_id", $discussion_id)->where("action", "last_read")->latest()->first();

        if ($last_read_message) {
            return (int) $last_read_message->response;
        }

        return 0;
    }
}

if (!function_exists("record_last_read_message")) {
    function record_last_read_message($discussion_id, $user_id, $message_id) {
        CaseDiscussionAction::updateOrCreate([
            "cd_id" => $discussion_id,
            "user_id" => $user_id,
            "action" => "last_read"
        ],[
            "cd_id" => $discussion_id,
            "user_id" => $user_id,
            "action" => "last_read",
            "response" => $message_id
        ]);
    }
}

if (!function_exists("unread_messages_count")) {
    function unread_messages_count($discussion_id, $user_id) {
        $last_read_msg = get_last_read_message($discussion_id, $user_id);

        return CaseDiscussionMessage::where("user_id", "<>", $user_id)->where("cd_id", $discussion_id)->where("id", ">", $last_read_msg)->count();
    }
}

if (!function_exists("get_discussion_files")) {
    function get_discussion_files(CaseDiscussion $discussion, $user_id = 0) {
        $data = [];
        $messages = CaseDiscussionMessage::where("cd_id", $discussion->id)
                    ->when($user_id, function($query) use ($user_id) {
                        $query->where("user_id", $user_id);
                    })
                    ->where("message_type", "file")
                    ->orderBy("id", "asc")
                    ->get();

        if ($messages->isNotEmpty()) {
            foreach ($messages as $message) {
                $db_file_information = unserialize($message->content);

                foreach ($db_file_information as $key => $file) {
                    $db_file_information[$key]["path"] = get_model_file_from_disk($file["path"], "case_discussion_documents");
                    $db_file_information[$key]["size"] = format_bytes($file["size"]);
                    $message_data = [];

                    foreach ($db_file_information[$key] as $dis_key => $dis_value) {
                        $message_data[$dis_key] = $dis_value;
                    }

                    $data[] = $message_data;
                }
            }
        }

        return $data;
    }
}

if (!function_exists("get_user_organization_name")) {
    function get_user_organization_name(User $user) {
        $organization = $user->member_role->where("status", "active")->first();
        $organization = (object) get_user_roles($user);

        $data = [];

        if ($organization) {
            if (isset($organization->union_sub_branch_name)) {
                $data["id"] = $organization->union_sub_branch_id;
                $data["type"] = "organization";
                $data["name"] = $organization->union_sub_branch_name;
            }
            elseif (isset($organization->union_branch_name)) {
                $data["id"] = $organization->union_branch_id;
                $data["type"] = "branch";
                $data["name"] = $organization->union_branch_name;
            }
            elseif (isset($organization->union_name)) {
                $data["id"] = $organization->union_id;
                $data["type"] = "union";
                $data["name"] = $organization->union_name;
            }
        }

        return $data;
    }
}

if (!function_exists("calculateDaysBetweenDates")) {
    function calculateDaysBetweenDates($startDate, $endDate) {
        // Create DateTime objects for each date
        $startDateTime = new DateTime($startDate);
        $endDateTime = new DateTime($endDate);

        // Calculate the difference between the two dates
        $interval = $startDateTime->diff($endDateTime);

        // Return the difference in days
        return $interval->days;
    }
}

function compareMonthNames($key1, $key2) {
    // Define the order of the month names
    $monthOrder = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    $key1Index = array_search($key1, $monthOrder);
    $key2Index = array_search($key2, $monthOrder);
    return $key1Index - $key2Index;
}

function compareDayNames($key1, $key2) {
    // Define the order of the month names
    $dayOrder = [
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday",
    ];

    $key1Index = array_search($key1, $dayOrder);
    $key2Index = array_search($key2, $dayOrder);
    return $key1Index - $key2Index;
}

function sortByUnreadMessages($a, $b) {
    return $b['unread_messages'] <=> $a['unread_messages'];
}
