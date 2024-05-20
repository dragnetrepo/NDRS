<?php

use App\Models\CaseDispute;

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

        return CaseDispute::whereHas('involved_parties', function ($query) use ($user_id) {
            $query->when(($user_id > 0), function($sub_query) use ($user_id) {
                $sub_query->where("user_id", $user_id);
            });
        })
        ->whereHas('union_data')
        ->where("id", $case_id)
        ->first();
    }
}
