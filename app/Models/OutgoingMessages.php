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
            "subject" => $subject,
            "message_content" => $content,
            "message_type" => $type,
            "send_attempt" => Carbon::now(),
        ]);

        return true;
    }
}
