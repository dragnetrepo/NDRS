<?php

use App\Http\Controllers\Api\Case\DiscussionController;
use App\Http\Controllers\Api\Union\UnionBranchController;
use App\Http\Controllers\Api\Union\UnionController;
use App\Http\Controllers\Api\Union\UnionSubBranchController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\Case\DisputesController;
use App\Http\Controllers\Api\Case\DocumentController;
use App\Http\Controllers\Api\Case\FolderController;
use App\Http\Controllers\Api\Post\PostCategoryController;
use App\Http\Controllers\Api\Post\PostController;
use App\Http\Controllers\Api\User\NotificationController;
use App\Http\Controllers\Api\User\DashboardController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('clear-data', function(){
    DB::statement('TRUNCATE users;');
    DB::statement('TRUNCATE email_invitations;');
    DB::statement('TRUNCATE email_validations;');
    DB::statement('TRUNCATE outgoing_messages;');

    return response()->json([
        'message' => 'Cleared data'
    ]);
});

Route::name("api.")->middleware(['cors'])->withoutMiddleware([\Illuminate\Routing\Middleware\ThrottleRequests::class])->group(function () {
    Route::get("/verify-password-token", [AuthenticationController::class, "verify_password_token"])->name("verify-password-token");
    Route::post("/create-password", [AuthenticationController::class, "create_password"])->name("create-password");

    Route::get("/validate-email", [AuthenticationController::class, "validate_email"])->name("validate-email");
    Route::post("/confirm-email-code", [AuthenticationController::class, "confirm_email_code"])->name("confirm-email-validation");

    Route::post("/login", [AuthenticationController::class, "login"])->name("log-in");
    Route::post("/two-factor-authentication", [AuthenticationController::class, "two_factor_authentication"])->name("two-factor-auth");
    Route::post("/resend-two-factor-authentication", [AuthenticationController::class, "resend_two_factor_authentication"])->name("two-factor-auth");
    Route::post("/reset-password", [AuthenticationController::class, "reset_password"])->name("reset-password");
    Route::post("/resend-verification-code", [AuthenticationController::class, "resend_validate_email"])->name("resend-verification-code");
    Route::get("/validate-password-reset-token", [AuthenticationController::class, "validate_password_reset_token"])->name("validate-reset-password-token");
    Route::post("/confirm-reset-password", [AuthenticationController::class, "confirm_password_reset"])->name("reset-password");

    Route::middleware(["auth:sanctum"])->group(function () {
        Route::post("/complete-registration", [AuthenticationController::class, "complete_registration"])->name("complete-account-registration");
        Route::name("profile.")->group(function () {
            Route::get("user-profile", [ProfileController::class, "index"])->name("index");
            Route::get("organization-profile", [ProfileController::class, "organization_profile"])->name("organization-profile");
            Route::post("edit/organization-profile", [ProfileController::class, "update_organization_profile"])->name("organization-profile-edit");
            Route::post("profile-update", [ProfileController::class, "update"])->name("update");
            Route::post("change-password", [ProfileController::class, "change_password"])->name("change-password");
            Route::delete("delete-account", [ProfileController::class, "destroy"])->name("delete");
        });

        Route::name("union.")->group(function () {
            Route::prefix("union")->group(function(){
                Route::controller(UnionController::class)->group(function(){
                    Route::get('{union}', "read")->name("read-by-id")->where('union', '[0-9]+');
                    Route::post('create', "create")->name("create")->middleware("custom_user_permission:create unions");
                    Route::post('bulk/create', "bulk_create")->name("bulk-create")->middleware("custom_user_permission:create unions");
                    Route::post('edit/{union}', "edit")->name("edit")->middleware("custom_user_permission:edit unions");
                    Route::get("/sample-csv", "sample_csv_file")->name("sample-csv-file")->middleware("custom_user_permission:create unions");
                    Route::post('send-invite/{union}', "send_invite")->name("send-invite");
                    Route::get('get-admins/{union}', "get_admins")->name("get-admins");
                    Route::delete('remove-admin/{union}', "remove_admin")->name("delete-admin");
                    Route::delete('delete/{union}', "delete")->name("delete");
                });

                Route::prefix("branch")->controller(UnionBranchController::class)->name("branch.")->group(function(){
                    Route::get('{branch}', "read")->name("read-by-id");
                    Route::post('create', "create")->name("create")->middleware("custom_user_permission:create branches");
                    Route::post('edit/{branch}', "edit")->name("edit")->middleware("custom_user_permission:edit branches");
                    Route::post('{branch}/send-invite', "send_invite")->name("send-invite");
                    Route::get('get-admins/{branch}', "get_admins")->name("get-admins");
                    Route::delete('remove-admin/{branch}', "remove_admin")->name("delete-admin");
                    Route::delete('delete/{branch}', "delete")->name("delete");
                });

                Route::prefix("sub-branch")->controller(UnionSubBranchController::class)->name("branch.")->group(function(){
                    Route::get('{sub_branch}', "read")->name("read-by-id");
                    Route::post('create', "create")->name("create")->middleware("custom_user_permission:create sub branches");
                    Route::post('edit/{sub_branch}', "edit")->name("edit")->middleware("custom_user_permission:edit sub branches");
                    Route::post('{sub_branch}/send-invite', "send_invite")->name("send-invite");
                    Route::get('get-admins/{sub_branch}', "get_admins")->name("get-admins");
                    Route::get('get-single-admin/{sub_branch}', "read_admin")->name("get-single-admin");
                    Route::delete('remove-admin/{sub_branch}', "remove_admin")->name("delete-admin");
                    Route::delete('delete/{sub_branch}', "delete")->name("delete");
                });

                Route::get('branch', [UnionBranchController::class, "union_branches"])->name("read-by-id");
                Route::get('organizations', [UnionSubBranchController::class, "union_sub_branches"])->name("read-by-id");
            });

            Route::get("get-unions", [UnionController::class, "index"])->name("all");
            Route::get("get-union-branches/{union}", [UnionBranchController::class, "index"])->name("branches");
            Route::get("get-union-organizations/{branch}", [UnionSubBranchController::class, "index"])->name("sub-branches");
            Route::get("search-organizations", [UnionSubBranchController::class, "search_organizations"])->name("search-org");
        });

        Route::prefix("case")->name("case.")->group(function(){
            Route::controller(DisputesController::class)->name("disputes.")->group(function(){
                Route::get("disputes/{status?}", "index")->name("index");
                Route::get("union/{union_id}", "index")->name("index");
                Route::get("roles", "roles")->name("roles");
                Route::get("read/{case_id}", "read")->name("read")->where('case_id', '[0-9]+');
                Route::post("create", "create")->name("create")->middleware("custom_user_permission:create dispute");
                Route::get("get-types", "get_case_types")->name("get-types")->middleware("custom_user_permission:create dispute");
                Route::post("edit/{case_id}", "edit")->name("edit")->where('case_id', '[0-9]+');
                Route::middleware("custom_user_permission:invite dispute participants")->group(function(){
                    Route::get("involved-parties/{case_id}", "involved_parties")->name("involved-parties")->where('case_id', '[0-9]+');
                    Route::post("invite-party/{case_id}", "invite_party")->name("invite-party")->where('case_id', '[0-9]+');
                    Route::post("resend-invite/{case_id}", "invite_party")->name("resend-invite-party")->where('case_id', '[0-9]+');
                    Route::post("suspend-invited-party/{case_id}", "suspend_invite_party")->name("suspend-invite")->where('case_id', '[0-9]+');
                    Route::delete("delete-invited-party/{case_id}", "delete_invite_party")->name("delete-invite")->where('case_id', '[0-9]+');
                    Route::get("get-invites", "get_invites")->name("get-invites");
                });
                Route::get("permissions/{case_id}", "permissions")->name("permissions");
                Route::post("invite-response/{case_id}", "invite_response")->name("invite-response")->where('case_id', '[0-9]+');
                Route::post("approve-case/{case_id}", "approve_case")->name("approve-case")->middleware("custom_user_permission:approve dispute")->where('case_id', '[0-9]+');

                Route::get("get-statuses", "get_case_status")->name("get-statuses");
                Route::middleware("custom_user_permission:change dispute case status")->group(function(){
                    Route::post("change-status/{case_id}", "update_case_status")->name("change-status")->where('case_id', '[0-9]+');
                });
            });

            Route::prefix("{case_id}")->group(function(){
                Route::controller(DocumentController::class)->name("documents.")->group(function(){
                    Route::get("documents", "index")->name("index");
                    Route::get("folder-documents/{folder_id}", "index")->name("folder-documents")->where('folder_id', '[0-9]+');
                    Route::middleware("custom_user_permission:create dispute")->group(function(){
                        Route::post("add-document", "add_document")->name("add");
                        Route::delete("delete-document", "delete_document")->name("delete");
                    });
                });

                Route::controller(FolderController::class)->name("folders.")->group(function(){
                    Route::get("folders", "index")->name("index");
                    Route::middleware("custom_user_permission:create dispute")->group(function(){
                        Route::post("create-folder", "create_folder")->name("create");
                        Route::post("rename-folder", "rename_folder")->name("rename");
                        Route::delete("delete-folder", "delete_folder")->name("delete");
                    });
                });
            });

            Route::prefix("discussions")->middleware("custom_user_permission:participate in resolution")->controller(DiscussionController::class)->name("discussion.")->group(function(){
                Route::get("/{case_id?}", "index")->name("index")->where('case_id', '[0-9]+');
                Route::get("/{discussion}/messages", "get_messages")->name("index")->where('discussion', '[0-9]+');
                Route::post("/{discussion}/send-message", "send_message")->name("send-message")->where('discussion', '[0-9]+');
                Route::get("/{discussion}/get-poll-result", "get_poll_result")->name("get-poll-votes")->where('discussion', '[0-9]+');
                Route::post("/{discussion}/vote-poll", "vote_on_poll")->name("poll-vote")->where('discussion', '[0-9]+');
                Route::post("/{discussion}/upload-document", "upload_document")->name("document-upload")->where('discussion', '[0-9]+');
                Route::get("/{discussion}/get-user", "get_user")->name("get-poll-votes")->where('discussion', '[0-9]+');
            });
        });

        Route::prefix("users")->controller(UserController::class)->name("user.")->group(function(){
            Route::get("/all", "index")->name("index");
            Route::get("/role/{role}", "index")->name("per-role");
            Route::get("/admin-roles", "admin_roles")->name("admin-roles");
            Route::get("/settlement-roles", "settlement_roles")->name("settlement-roles");
            Route::get("/permissions", "permissions")->name("permissions");
            Route::get("/get-roles", "get_roles")->name("get-roles");
            Route::middleware("custom_user_permission:edit roles and permissions")->group(function(){
                Route::post("/create-role", "create_role")->name("create-role");
                Route::post("/restore-role-default", "restore_role_default")->name("restore-role-default");
                Route::post("/update-permission", "update_role_permission")->name("add-role-permission");
            });

            Route::prefix("requests")->name("request.")->group(function(){
                Route::post("new-role", "new_role")->name("new-role");
                Route::post("new-organization", "new_organization")->name("new-organization");
                Route::post("delete-organization", "delete_organization")->name("delete-organization");
            });

            Route::middleware("custom_user_permission:invite users")->group(function(){
                Route::get("/sample-csv", "sample_csv_file")->name("sample-csv-file");
                Route::post("/send-invite", "send_invite")->name("send-invite");
                Route::post("/bulk/send-invite", "bulk_send_invite")->name("bulk-send-invite");
            });

            Route::post("/refer-case/{user}", "refer_case")->name("refer-case")->middleware("custom_user_permission:assign users cases");
            Route::post("/change-status/{user}", "change_status")->name("change-admin-status")->middleware("custom_user_permission:edit users status");

            Route::get("/get-board-of-enquiries", "get_board_enquiry")->name("view-body-members");
            Route::post("/create-board-of-enquiry", "create_board_enquiry")->name("create-board-of-enquiry");

            Route::get("/get-settlement-body/{role}", "get_settlement_body")->name("get-settlement-body");
            Route::post("/create-settlement-body/{role}", "create_settlement_body")->name("create-settlement-body");
            Route::post("/refer-case-to-body/{settlement}", "refer_case_to_body")->name("refer-case-to-body");
            Route::get("/view-board-members/{settlement}", "body_members")->name("view-body-members");
            Route::delete("/dissolve-board-of-enquiry/{settlement}", "dissolve_board_enquiry")->name("dissolve-board-of-enquiry");
            Route::post("/invite-board-member/{settlement}", "invite_body_member")->name("invite-board-member");
            Route::delete("/remove-board-member/{member}", "remove_body_member")->name("remove-board-member");
        });

        Route::prefix("notifications")->controller(NotificationController::class)->name("notification.")->group(function() {
            Route::get("/", "index")->name("index");
            Route::get("/cases/{case}", "index")->name("cases")->middleware("custom_user_permission:view dispute notifications")->where('case', '[0-9]+');
            Route::get("/status/{status}", "index")->name("status");
            Route::post("/mark-as-read", "mark_as_read")->name("mark-as-read");
            Route::get("/settings", "settings")->name("settings");
            Route::post("/update-setting", "update_setting")->name("update-settings");
        });

        Route::prefix("posts")->name("post.")->group(function(){
            Route::prefix("categories")->controller(PostCategoryController::class)->group(function(){
                Route::get("/", "index")->name("index");
                Route::get("/{category_id}", "read")->name("index");
                Route::post("/create", "store")->name("create");
                Route::post("/edit/{category_id}", "update")->name("edit");
                Route::delete("/delete/{category_id}", "destroy")->name("delete");
            });

            Route::controller(PostController::class)->group(function(){
                Route::get("/{category_id}", "index")->name("index");
                Route::get("/read/{post_id}", "post")->name("index");
                Route::post("/create", "store")->name("create");
                Route::post("/edit/{post_id}", "update")->name("edit");
                Route::delete("/delete/{post_id}", "destroy")->name("delete");
            });
        });

        Route::prefix("documents")->name("document")->group(function(){
            Route::controller(FolderController::class)->group(function(){
                Route::get("folders", "all_folders");
                Route::post("create-folder", "create_folder")->name("create");
            });

            Route::controller(DocumentController::class)->group(function(){
                Route::get("/all/{folder_id?}", "index")->name("index")->where('folder_id', '[0-9]+');
                Route::post("add", "add_document")->name("add");
            });
        });

        Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");
        Route::get("search", [DashboardController::class, "search"])->name("search");
        Route::middleware("custom_user_permission:view reports")->group(function(){
            Route::get("dispute-resolution-report", [DashboardController::class, "dispute_resolutions_report"])->name("dispute-resolution-report");
            Route::get("reports", [DashboardController::class, "reports"])->name("reports");
        });
        Route::get("get-industries", [UserController::class, "industries"])->name("industries");
        Route::get("/settings/{auth}", [NotificationController::class, "settings"])->name("auth-settings");
        Route::post("/send-message", [ProfileController::class, "send_message"])->name("send-message");
        Route::get("/logout", [AuthenticationController::class, "logout"])->name("log-out");
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
