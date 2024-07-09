<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

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

    public function body_member()
    {
        return $this->belongsTo(SettlementBodyMember::class, "sb_id", "sb_id");
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'case_role_id');
    }
}
