<?php
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
