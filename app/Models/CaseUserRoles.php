<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseUserRoles extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function dispute()
    {
        return $this->belongsTo(CaseDispute::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsTo(CaseRoles::class, 'case_role_id');
    }
}
