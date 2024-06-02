<?php

use App\Http\Controllers\Api\Case\DiscussionController;
use App\Http\Controllers\Api\Union\UnionBranchController;
use App\Http\Controllers\Api\Union\UnionController;
use App\Http\Controllers\Api\Union\UnionSubBranchController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\Case\DisputesController;
use App\Http\Controllers\Api\Case\DocumentController;
use App\Http\Controllers\Api\Case\FolderController;
use App\Http\Controllers\Api\User\NotificationController;
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

Route::name("api.")->middleware(['cors'])->group(function () {
    Route::get("/verify-password-token", [AuthenticationController::class, "verify_password_token"])->name("verify-password-token");
    Route::post("/create-password", [AuthenticationController::class, "create_password"])->name("create-password");

    Route::get("/validate-email", [AuthenticationController::class, "validate_email"])->name("validate-email");
    Route::post("/confirm-email-code", [AuthenticationController::class, "confirm_email_code"])->name("confirm-email-validation");

    Route::post("/login", [AuthenticationController::class, "login"])->name("log-in");
    Route::post("/two-factor-authentication", [AuthenticationController::class, "two_factor_authentication"])->name("log-in");
    Route::post("/reset-password", [AuthenticationController::class, "reset_password"])->name("reset-password");
    Route::get("/rvalidate-password-reset-token", [AuthenticationController::class, "validate_password_reset_token"])->name("validate-reset-password-token");
    Route::post("/confirm-reset-password", [AuthenticationController::class, "confirm_password_reset"])->name("reset-password");

    Route::middleware(["auth:sanctum"])->group(function () {
        Route::post("/complete-registration", [AuthenticationController::class, "complete_registration"])->name("complete-account-registration");
        Route::name("profile.")->group(function () {
            Route::get("user-profile", [ProfileController::class, "index"])->name("index");
            Route::post("profile-update", [ProfileController::class, "update"])->name("update");
        });

        Route::name("union.")->group(function () {
            Route::prefix("union")->group(function(){
                Route::controller(UnionController::class)->group(function(){
                    Route::get('{union}', "read")->name("read-by-id");
                    Route::post('create', "create")->name("create");
                    Route::post('bulk/create', "bulk_create")->name("bulk-create");
                    Route::post('edit/{union}', "edit")->name("edit");
                    Route::post('send-invite/{union}', "send_invite")->name("send-invite");
                    Route::get('get-admins/{union}', "get_admins")->name("get-admins");
                    Route::delete('remove-admin/{union}', "remove_admin")->name("delete-admin");
                    Route::delete('delete/{union}', "delete")->name("delete");
                });

                Route::prefix("branch")->controller(UnionBranchController::class,)->name("branch.")->group(function(){
                    Route::get('{branch}', "read")->name("read-by-id");
                    Route::post('create', "create")->name("create");
                    Route::post('edit/{branch}', "edit")->name("edit");
                    Route::post('{branch}/send-invite', "send_invite")->name("send-invite");
                    Route::delete('delete/{branch}', "delete")->name("delete");
                });

                Route::prefix("sub-branch")->controller(UnionSubBranchController::class)->name("branch.")->group(function(){
                    Route::get('{sub_branch}', "create")->name("create");
                    Route::post('create', "create")->name("create");
                    Route::post('edit/{sub_branch}', "edit")->name("edit");
                    Route::post('{sub_branch}/send-invite', "send_invite")->name("send-invite");
                    Route::delete('delete/{sub_branch}', "delete")->name("delete");
                });
            });

            Route::get("get-unions", [UnionController::class, "index"])->name("index");
            Route::get("get-union-branches/{union}", [UnionBranchController::class, "index"])->name("branches");
            Route::get("get-union-organizations/{branch}", [UnionSubBranchController::class, "index"])->name("sub-branches");
        });

        Route::prefix("case")->name("case.")->group(function(){
            Route::controller(DisputesController::class)->name("disputes.")->group(function(){
                Route::get("disputes", "index")->name("index");
                Route::get("roles", "roles")->name("roles");
                Route::get("read/{case_id}", "read")->name("read");
                Route::post("create", "create")->name("create");
                Route::post("edit/{case_id}", "edit")->name("edit");
                Route::get("involved-parties/{case_id}", "involved_parties")->name("involved-parties");
                Route::post("invite-party/{case_id}", "invite_party")->name("invite-party");
                Route::post("resend-invite/{case_id}", "invite_party")->name("resend-invite-party");
                Route::post("suspend-invited-party/{case_id}", "suspend_invite_party")->name("suspend-invite");
                Route::delete("delete-invited-party/{case_id}", "delete_invite_party")->name("delete-invite");
                Route::get("get-invites", "get_invites")->name("get-invites");
                Route::post("invite-response/{case_id}", "invite_response")->name("invite-response");
                Route::post("change-status/{case_id}", "update_case_status")->name("change-status");
            });

            Route::prefix("{case_id}")->group(function(){
                Route::controller(DocumentController::class)->name("documents.")->group(function(){
                    Route::get("documents", "index")->name("index");
                    Route::post("add-document", "add_document")->name("add");
                    Route::delete("delete-document", "delete_document")->name("delete");
                    Route::get("folder-documents/{folder_id}", "index")->name("folder-documents");
                });

                Route::controller(FolderController::class)->name("folders.")->group(function(){
                    Route::get("folders", "index")->name("index");
                    Route::post("create-folder", "create_folder")->name("create");
                    Route::post("rename-folder", "rename_folder")->name("rename");
                    Route::delete("delete-folder", "delete_folder")->name("delete");
                });
            });

            Route::prefix("discussions")->controller(DiscussionController::class)->name("discussion.")->group(function(){
                Route::get("/", "index")->name("index");
                Route::get("/{discussion}/messages", "get_messages")->name("index");
                Route::post("/{discussion}/send-message", "send_message")->name("send-message");
                Route::post("/{discussion}/vote-poll", "vote_on_poll")->name("poll-vote");
                Route::post("/{discussion}/upload-document", "upload_document")->name("document-upload");
            });
        });

        Route::prefix("users")->controller(UserController::class)->name("user.")->group(function(){
            Route::get("/all", "index")->name("index");
            Route::get("/role/{role}", "index")->name("per-role");
            Route::get("/admin-roles", "admin_roles")->name("admin-roles");
            Route::get("/settlement-roles", "settlement_roles")->name("settlement-roles");
            Route::get("/permissions", "permissions")->name("permissions");
            Route::post("/create-role", "create_role")->name("create-role");
            Route::post("/restore-role-default", "restore_role_default")->name("restore-role-default");
            Route::get("/get-roles", "get_roles")->name("get-roles");
            Route::post("/update-permission", "update_role_permission")->name("add-role-permission");

            Route::get("/sample-csv", "sample_csv_file")->name("sample-csv-file");
            Route::post("/send-invite", "send_invite")->name("send-invite");
            Route::post("/bulk/send-invite", "bulk_send_invite")->name("bulk-send-invite");

            Route::post("/refer-case/{user}", "refer_case")->name("refer-case");
            Route::post("/change-status/{user}", "change_status")->name("change-admin-status");

            Route::get("/get-board-of-enquiries", "get_board_enquiry")->name("view-body-members");
            Route::post("/create-board-of-enquiry", "create_board_enquiry")->name("create-board-of-enquiry");
            Route::post("/refer-case-to-body/{settlement}", "refer_case_to_body")->name("refer-case-to-body");
            Route::get("/view-board-members/{settlement}", "body_members")->name("view-body-members");
            Route::delete("/dissolve-board-of-enquiry/{settlement}", "dissolve_board_enquiry")->name("dissolve-board-of-enquiry");
            Route::post("/invite-board-member/{settlement}", "invite_body_member")->name("invite-board-member");
            Route::delete("/remove-board-member/{member}", "remove_body_member")->name("remove-board-member");
        });

        Route::prefix("notifications")->controller(NotificationController::class)->name("notification.")->group(function() {
            Route::get("/", "index")->name("index");
            Route::get("/cases/{case}", "index")->name("cases");
            Route::get("/status/{status}", "index")->name("status");
            Route::post("/mark-as-read", "mark_as_read")->name("mark-as-read");
        });

        // Route::get('roles', [ProfileController::class, "get_roles"])->name("get-roles");
        Route::get("/logout", [AuthenticationController::class, "logout"])->name("log-out");
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
