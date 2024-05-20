<?php

use App\Http\Controllers\Api\Union\UnionBranchController;
use App\Http\Controllers\Api\Union\UnionController;
use App\Http\Controllers\Api\Union\UnionSubBranchController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Api\Case\DisputesController;
use App\Http\Controllers\Api\Case\DocumentController;
use App\Http\Controllers\Api\Case\FolderController;
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
                    Route::post('edit/{union}', "edit")->name("edit");
                    Route::post('send-invite/{union}', "send_invite")->name("send-invite");
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
                Route::post("invite-response/{case_id}", "invite_response")->name("invite-response");
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
        });

        Route::get('roles', [ProfileController::class, "get_roles"])->name("get-roles");
        Route::get("/logout", [AuthenticationController::class, "logout"])->name("log-out");
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
