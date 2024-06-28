<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ConfirmEmailValidation;
use App\Http\Requests\Auth\ConfirmPasswordResetRequest;
use App\Http\Requests\Auth\CreatePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationForm;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\TwoFactorAuthenticationRequest;
use App\Http\Requests\Auth\ValidateEmailRequest;
use App\Http\Requests\Auth\VerifyAccountRequest;
use App\Models\EmailInvitations;
use App\Models\EmailValidation;
use App\Models\OutgoingMessages;
use App\Models\Settings;
use App\Models\UnionUserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class AuthenticationController extends Controller
{
    protected $outgoing_messages;
    protected $response;

    public function __construct()
    {
        $this->outgoing_messages = new OutgoingMessages();
        $this->response = [
            'status' => Response::HTTP_FORBIDDEN,
            'message' => 'We could not complete your request. Please try again!',
            'error' => []
        ];
    }

    public function verify_password_token(Request $request)
    {
        $token = $request->invite_token;

        $get_invite = EmailInvitations::where("token", $token)->first();

        if ($get_invite) {
            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Valid URL invite token";
        }
        else {
            $this->response["message"] = "Invalid URL invite token";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function create_password(CreatePasswordRequest $request)
    {
        if ($request->invite_token) {
            $get_invite = EmailInvitations::where("token", $request->invite_token)->first();

            if ($get_invite) {
                if ($get_invite->status == "pending") {
                    // Register Account
                    $user = User::updateOrCreate([
                        "email" => $get_invite->email,
                    ],[
                        "email" => $get_invite->email,
                        "password" => Hash::make($request->password),
                        "email_verified_at" => Carbon::now(),
                        "status" => "active"
                    ]);

                    if ($user) {
                        // Add user to their union/branch
                        UnionUserRole::updateOrCreate([
                            "user_id" => $user->id,
                        ],[
                            "user_id" => $user->id,
                            "role_id" => $get_invite->role_id,
                            "union_id" => $get_invite->union_id,
                            "branch_id" => $get_invite->union_branch_id,
                            "sub_branch_id" => $get_invite->union_sub_branch_id,
                            "status" => "active"
                        ]);

                        $this->response["status"] = Response::HTTP_OK;
                        $this->response["message"] = "Password has been created successfully!";
                        $this->response["data"] = [
                            "token" => login_user_token($user)
                        ];

                        $get_invite->status = "completed";
                        $get_invite->save();
                    }
                }
                elseif ($get_invite->status == "completed") {
                    $this->response["message"] = "A password has already been set for this account. If you have forgotten your password, please use the reset password link!";
                }
                elseif ($get_invite->status == "expired") {
                    $this->response["message"] = "This link has expired!";
                }
            }
        }
        elseif ($request->email) {
            $user = User::updateOrCreate([
                "email" => $request->email,
            ],[
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "email_verified_at" => Carbon::now()
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = [
                "token" => login_user_token($user)
            ];
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function validate_email(ValidateEmailRequest $request)
    {
        DB::beginTransaction();
        try {
            $email_code = rand(000000, 999999);
            EmailValidation::create([
                "email" => $request->email,
                "code" => $email_code,
            ]);

            $message_body = "<p>Hello, there";
            $message_body .= "<p>We hope this email finds you well.</p>";
            $message_body .= "<p>An account was created with your email address (".$request->email."). To verify your email address, kindly copy the code below to verify your account.</p>";
            $message_body .= "<p>$email_code</p>";
            $message_body .= "<p>If you did not initiate this request, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
            $message_body .= "<p>Cheers,</p>";
            $message_body .= "<p>".env("APP_NAME")." Team</p>";

            $message_sent = $this->outgoing_messages->send_message(0, $request->email, "account verification", "email", "Verify your Email", $message_body);

            DB::commit();

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Your account has been created successfully! Kindly verify your email by checking your inbox for a verification link in order to continue";

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->response["message"] = "We encountered an error while trying to create your account. Kindly try again. If error persists, please contact Tech Support";
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function confirm_email_code(ConfirmEmailValidation $request)
    {
        $email_valid = EmailValidation::where("email", $request->email)->where("status", "pending")->where("type", "registration")->orderBy("id", "desc")->first();

        if ($email_valid) {
            if ($email_valid->code == $request->code) {
                // Create User account and mark email has validated
                $user = User::create([
                    "email" => $request->email,
                    "email_verified_at" => Carbon::now()
                ]);

                $email_valid->status = "confirmed";
                $email_valid->save();

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Your email has been validated successfully!";
                $this->response["data"] = [
                    "token" => login_user_token($user)
                ];
            }
            else {
                $this->response["message"] = "Invalid code submitted!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function complete_registration(RegistrationForm $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $file_name = "";

            if ($request->hasFile("display_picture")) {
                // This file
                $file_name = sha1(time().$user->id).'.'.$request->file('display_picture')->getClientOriginalExtension();
                $request->file('display_picture')->storeAs("", $file_name, ['disk' => 'profile_photos']);
            }

            User::where("id", $user->id)->update([
                "first_name" => $request->first_name,
                "middle_name" => $request->middle_name ?? '',
                "last_name" => $request->last_name,
                "name" => trim($request->first_name.' '.($request->middle_name ?? '').' '.$request->last_name),
                "phone" => $request->phone,
                "display_picture" => $file_name,
                "email_verified_at" => Carbon::now(),
                // "password" => Hash::make($request->password),
            ]);

            // Get Member Role ID
            $role = Role::where("name", "staff")->first();

            if ($role) {
                if (!UnionUserRole::where("user_id", $user->id)->exists()) {
                    UnionUserRole::create([
                        "user_id" => $user->id,
                        "role_id" => $role->id,
                        "union_id" => $request->union,
                        "branch_id" => $request->union_branch,
                        "sub_branch_id" => $request->organization,
                    ]);
                }
            }

            DB::commit();

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Your account has been created successfully! You can now access the dashboard!";

        } catch (\Throwable $th) {
            DB::rollBack();
            $this->response["message"] = "We encountered an error while trying to create your account. Kindly try again. If error persists, please contact Tech Support";
            Log::error($th->getMessage());
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        $data = [];
        $this->response["message"] = "The credentials submitted do not match our records!";

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $this->response["status"] = Response::HTTP_OK;

                if (get_user_settings_value($user, "2fa")) {
                    $data["page"] = "two-factor-auth";
                    $data["email"] = $request->email;
                    $this->send_2fa_email($user);
                    $this->response["message"] = "An email containing a six digit code has been sent to your email to continue your login process.";
                }
                else {
                    $this->response["message"] = "You are successfully logged in!";
                    $data = $this->determine_user_login($user);
                }

                $this->response["data"] = $data;
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function two_factor_authentication(TwoFactorAuthenticationRequest $request)
    {
        $valid_code = EmailValidation::where("email", $request->email)->where("type", "2fauth")->where("status", "pending")->orderBy("id", "desc")->first();

        if ($valid_code) {
            if ($valid_code->code == $request->auth_code) {
                $valid_code->status = "confirmed";
                $valid_code->save();

                $user = User::where("email", $valid_code->email)->first();

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "You are successfully logged in!";
                $this->response["data"] = $this->determine_user_login($user);
            }
            else {
                $this->response["message"] = "Invalid code provided!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $user = User::where("email", $request->email)->orwhere("phone", $request->phone)->first();

        if ($user) {
            DB::beginTransaction();

            try {
                $password_reset_token = sha1(uniqid(Carbon::now()));

                DB::table("password_resets")->insert([
                    "email" => $user->email,
                    "token" => $password_reset_token,
                    "created_at" => Carbon::now()
                ]);

                $password_reset_url = url('/reset-password/'.$password_reset_token);

                $message_body = "<p>Hello, ".$user->first_name;
                $message_body .= "<p>We hope this email finds you well.</p>";
                $message_body .= "<p>A password reset was triggered on your account with us. Click <a href='".$password_reset_url."'>here</a> to reset your password or copy the link bewlow onto a browser to complete your request..</p>";
                $message_body .= "<p>$password_reset_url</p>";
                $message_body .= "<p>If you did not initiate this request, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
                $message_body .= "<p>Cheers,</p>";
                $message_body .= "<p>".env("APP_NAME")." Team</p>";

                $message_sent = $this->outgoing_messages->send_message($user->id, $user->email, "password reset", "email", "Reset your Password", $message_body);

                DB::commit();

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "A mail containing the process of reseting your password has been sent to your email address ";
            } catch (\Throwable $th) {
                DB::rollBack();
                $this->response["message"] = "We encountered an error while trying to initiate your password reset. Please try again. If error persists, please contact Tech Support";
                Log::error($th->getMessage());
            }
        }
        else {
            $this->response["message"] = "Invalid account information provided";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function validate_password_reset_token(Request $request)
    {
        $valid_token = DB::table("password_resets")->where("token", $request->reset_token)->first();

        if ($valid_token) {
            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Valid password token!";
        }
        else {
            $this->response["message"] = "invalid password token!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function confirm_password_reset(ConfirmPasswordResetRequest $request)
    {
        $valid_token = DB::table("password_resets")->where("token", $request->reset_token)->first();

        if ($valid_token) {
            $user = User::where("email", $valid_token->email)->first();

            if ($user) {
                $user->password = Hash::make($request->password);
                $user->save();

                $valid_token->delete();

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Your password has been reset successfully!";
            }
        }
        else {
            $this->response["message"] = "We could not complete your request at this time. Please refresh and try again!";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "You are successfully logged out!";

        return response()->json($this->response, $this->response["status"]);
    }

    private function determine_user_login(User $user)
    {
        $data = [];
        $data["token"] = login_user_token($user);

        if ($user->email_verified_at) {
            $data["page"] = "dashboard";
            $data["user_role"] = get_user_roles($user);
        }
        else {
            $data["page"] = "verify-account";
        }

        return $data;
    }

    private function send_2fa_email(User $user)
    {
        $email_code = rand(100000, 999999);

        EmailValidation::create([
            "email" => $user->email,
            "code" => $email_code,
            "type" => "2fauth"
        ]);

        $message_body = "<p>Hello, there";
        $message_body .= "<p>We hope this email finds you well.</p>";
        $message_body .= "<p>You have made an attempt to log into your account on our platform. To continue, kindly copy the code below to log into your account.</p>";
        $message_body .= "<p>$email_code</p>";
        $message_body .= "<p>If you did not initiate this request, kindly ignore this email or you can contact us at ".env("CONTACT_EMAIL")." for more information.</p>";
        $message_body .= "<p>Cheers,</p>";
        $message_body .= "<p>".env("APP_NAME")." Team</p>";

        $message_sent = $this->outgoing_messages->send_message($user->id, $user->email, "two factor authentication", "email", "Access your NDRS dashboard", $message_body);

        return $message_sent;
    }
}
