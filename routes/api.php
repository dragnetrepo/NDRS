<?php

use App\Http\Controllers\Api\Union\UnionBranchController;
use App\Http\Controllers\Api\Union\UnionController;
use App\Http\Controllers\Api\Union\UnionSubBranchController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Http\Request;
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
                Route::post('create', [UnionController::class, "create"])->name("create");
                Route::post('send-invite', [UnionController::class, "send_invite"])->name("send-invite");
            });
            Route::get("get-unions", [UnionController::class, "index"])->name("index");
            Route::get("get-union-branches/{union}", [UnionBranchController::class, "index"])->name("branches");
            Route::get("get-union-organizations/{branch}", [UnionSubBranchController::class, "index"])->name("sub-branches");
        });

        Route::get('roles', [ProfileController::class, "get_roles"])->name("get-roles");
        Route::get("/logout", [AuthenticationController::class, "login"])->name("log-out");
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
