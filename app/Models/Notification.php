<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public const ALL_NOTIFICATIONS = [
        "mentions" => [
            "email" => "1",
            "whatsapp" => "1",
            "sms" => "1",
        ],
        "requests" => [
            "email" => "1",
            "whatsapp" => "1",
            "sms" => "1",
        ],
        "case_updates" => [
            "email" => "1",
            "whatsapp" => "1",
            "sms" => "1",
        ],
        "case_updates" => [
            "email" => "1",
            "whatsapp" => "1",
            "sms" => "1",
        ],
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_triggered()
    {
        return $this->belongsTo(User::class, 'triggered_by');
    }
}
