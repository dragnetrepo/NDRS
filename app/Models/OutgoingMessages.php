<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutgoingMessages extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function send_message($user_id, $recipient, $purpose, $type, $content)
    {
        $outgoing_message = OutgoingMessages::create([
            "user_id" => $user_id,
            "message_purpose" => $purpose,
            "recipient" => $recipient,
            "message_content" => $content,
            "message_type" => $type,
            "send_attempt" => Carbon::now(),
        ]);

        // Function to send out message(s) here!
        $message_sent = true;

        if ($message_sent) {
            $outgoing_message->status = "sent";
        }
        else {
            $outgoing_message->status = "failed";
        }
        $outgoing_message->save();


        return true;
    }
}
