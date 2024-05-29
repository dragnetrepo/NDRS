<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseDiscussion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function dispute()
    {
        return $this->belongsTo(CaseDispute::class, 'case_id');
    }

    public function messages()
    {
        return $this->hasMany(CaseDiscussionMessage::class, 'cd_id');
    }
}
