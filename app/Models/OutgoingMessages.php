<?php

namespace App\Models;

use Carbon\Carbon;
use Exception as GlobalException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class OutgoingMessages extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function send_message($user_id, $recipient, $purpose, $type, $subject, $content)
    {
        $outgoing_message = OutgoingMessages::create([
            "user_id" => $user_id,
            "message_purpose" => $purpose,
            "recipient" => $recipient,
            "message_content" => $content,
            "message_type" => $type,
            "send_attempt" => Carbon::now(),
        ]);

        $email_sent = false;

        // Function to send out message(s) here!
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {
            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env("MAIL_HOST");             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = env("MAIL_USERNAME");   //  sender username
            $mail->Password = env("MAIL_PASSWORD");       // sender password
            $mail->SMTPSecure = env("MAIL_ENCRYPTION");                  // encryption - ssl/tls
            $mail->Port = env("MAIL_PORT");                          // port - 587/465

            $mail->setFrom(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));
            $mail->addAddress($recipient);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            $mail->addReplyTo(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"));

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $subject;
            $mail->Body    = $content;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                Log::error($mail->ErrorInfo);
                $outgoing_message->status = "failed";
            }

            else {
                $outgoing_message->status = "sent";
                $email_sent = true;
            }
            $outgoing_message->save();

        } catch (GlobalException $e) {
            Log::error($e->getMessage());
            $outgoing_message->status = "failed";
            $outgoing_message->save();
        }


        return $email_sent;
    }
}
