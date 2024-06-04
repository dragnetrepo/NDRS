<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        "value" => "json"
    ];

    public const ALL_SETTINGS = [
        "mentions" => [
            "name" => "Mentions",
            "description" => "Notifications about any mentions in any discussions on the platform",
            "settings" => [
                "email" => "1",
                "whatsapp" => "1",
                "sms" => "1",
            ]
        ],
        "requests" => [
            "name" => "Requests",
            "description" => "Specific notifications about case verdicts requiring your review, polls, etc",
            "settings" => [
                "email" => "1",
                "whatsapp" => "1",
                "sms" => "1",
            ]
        ],
        "case_updates" => [
            "name" => "Case Updates",
            "description" => "General updates about a case like document updates and discussions",
            "settings" => [
                "email" => "1",
                "whatsapp" => "1",
                "sms" => "1",
            ]
        ],
        "invites" => [
            "name" => "Invites",
            "description" => "Notifications when you get invited to a new dispute or branch",
            "settings" => [
                "email" => "1",
                "whatsapp" => "1",
                "sms" => "1",
            ]
        ],
        "2fa" => [
            "name" => "2 Step Authentication",
            "description" => "Receive a code on your registered email or phone number before you log in to confirm that it's really you",
            "value" => "1"
        ],
    ];
}
