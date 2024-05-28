<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;

class SettlementBody extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function disputes()
    {
        return $this->hasMany(CaseUserRoles::class, 'sb_id');
    }

    public function members()
    {
        return $this->hasMany(SettlementBodyMember::class, 'sb_id');
    }
}
