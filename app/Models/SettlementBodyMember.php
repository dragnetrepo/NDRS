<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettlementBodyMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->where("id", $this->user_id)->orwhere("email", $this->email);
    }

    public function body()
    {
        return $this->belongsTo(SettlementBody::class, "sb_id");
    }
}
