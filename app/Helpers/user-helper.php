<?php

use App\Models\CaseDispute;
use App\Models\OutgoingMessages;
use Illuminate\Support\Facades\View;

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
    function get_user_settings_value($user, $setting) {
        $settings = $user->settings;

        if ($settings) {
            if ($settings->value) {
                $settings_record = $settings->value;

                if (isset($settings_record[$setting])) {
                    return $settings_record[$setting];
                }
            }
        }

        return false;
    }
}

if (!function_exists("get_case_dispute")) {
    function get_case_dispute($case_id, $user_id = 0) {

        return CaseDispute::where(function($query) use ($user_id) {
            $query->where("created_by", $user_id)->orWhereHas('union_data.users', function ($query) use ($user_id) {
                $query->where("user_id", $user_id);
            });
        })
        ->whereHas('union_data')
        ->where("id", $case_id)
        ->first();
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
