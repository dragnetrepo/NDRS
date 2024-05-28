<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PopulateDefaultValuesInTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:populate-default-values-in-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user_roles = [
            "ministry admin" => [
                "display_name" => "Ministry Admin",
                "type" => "admin",
            ],
            "national union admin" => [
                "display_name" => "National Union Admin",
                "type" => "admin",
            ],
            "union branch admin" => [
                "display_name" => "Union Branch Admin",
                "type" => "admin",
            ],
            "employers" => [
                "display_name" => "Employers (Organization Admins)",
                "type" => "admin",
            ],
            "staff" => [
                "display_name" => "Staff (Union Members)",
                "type" => "admin",
            ],
            "non union members" => [
                "display_name" => "Non Union Members",
                "type" => "admin",
            ],
            "councilliators and arbitrators" => [
                "display_name" => "Councilliators & Arbitrators",
                "type" => "settlement-body",
            ],
            "mediators" => [
                "display_name" => "Mediators",
                "type" => "settlement-body",
            ],
            "industrial arbitration panel" => [
                "display_name" => "Industrial Arbitration Panel",
                "type" => "settlement-body",
            ],
            "board of enquiry" => [
                "display_name" => "Board of Enquiry",
                "type" => "settlement-body",
            ],
            "national industrial courts" => [
                "display_name" => "National Industrial Courts",
                "type" => "settlement-body",
            ],
        ];

        $role_permissions = [
            "disputes" => [
                "description" => "All permission relating to disputes",
                "permissions" => [
                    "create dispute" => "Create dispute",
                    "approve dispute" => "Approve dispute",
                    "invite dispute participants" => "Invite dispute participants",
                    "change dispute case status" => "Change dispute case status",
                    "participate in resolution" => "Participate in resolution",
                    "view dispute notifications" => "View dispute notifications",
                ]
            ],
            "union & branches" => [
                "description" => "Permissions related to creating and editing unions, branches or sub branches",
                "permissions" => [
                    "create unions" => "Create unions",
                    "create branches" => "Create branches",
                    "create sub branches" => "Create sub branches",
                    "edit unions" => "Edit unions",
                    "edit branches" => "Edit branches",
                    "edit sub branches" => "Edit sub branches",
                ]
            ],
            "user & groups" => [
                "description" => "Permissions related to users and groups",
                "permissions" => [
                    "invite users" => "Invite users",
                    "edit users status" => "Edit users status",
                    "assign users cases" => "Assign users cases",
                    "edit roles and permissions" => "Edit roles & permissions",
                ]
            ],
            "reports" => [
                "description" => "Permissions regarding the reporting feature",
                "permissions" => [
                    "view reports" => "View reports",
                    "download reports" => "Download reports",
                ]
            ],
        ];

        foreach ($user_roles as $name => $role_details) {
            $get_role = Role::where("name", $name)->first();
            if ($get_role) {
                $get_role->display_name = $role_details["display_name"];
                $get_role->save();
            }
            else {
                Role::create([
                    "name" => $name,
                    "display_name" => $role_details["display_name"],
                    "type" => $role_details["type"],
                    "guard_name" => "sanctum",
                    "is_default" => "1",
                ]);
            }
        }

        foreach ($role_permissions as $group_name => $group_permissions) {
            $group_description = $group_permissions["description"];

            foreach ($group_permissions["permissions"] as $permission_name => $permission_display_name) {
                $get_permission = Permission::where("name", $permission_name)->first();
                if ($get_permission) {
                    $get_permission->display_name = $permission_display_name;
                    $get_permission->save();
                }
                else {
                    Permission::create([
                        "name" => $permission_name,
                        "display_name" => $permission_display_name,
                        "group" => $group_name,
                        "guard_name" => "sanctum",
                        "group_desc" => $group_description,
                    ]);
                }


                foreach ($user_roles as $name => $display_name) {
                    $get_role = Role::where("name", $name)->first();
                    if ($get_role) {
                        if (!$get_role->hasPermissionTo($permission_name)) {
                            $get_role->givePermissionTo($permission_name);
                        }
                    }
                }
            }
        }

        $get_role = Role::where("name", "ministry admin")->where("guard_name", "sanctum")->first();

        if ($get_role) {
            if ($user = User::where("email", "admin@ndrs.com")->first()) {
                if (!$user->hasRole($get_role->name)) {
                    $user->assignRole($get_role->name);
                }
            }
            else {
                $user = User::create([
                    "email" => "admin@ndrs.com",
                    "password" => Hash::make("passndrs12word#")
                ]);

                $user->assignRole($get_role->name);
            }
        }
    }
}
