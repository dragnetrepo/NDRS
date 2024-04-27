<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Contracts\Role;

class UnionUserRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function union_branch()
    {
        return $this->belongsTo(UnionBranch::class, "branch_id");
    }

    public function union_sub_branch()
    {
        return $this->belongsTo(UnionSubBranch::class, "sub_branch_id");
    }
}
