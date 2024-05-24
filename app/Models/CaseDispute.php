<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseDispute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function involved_parties()
    {
        return $this->hasMany(CaseUserRoles::class, 'case_id');
    }

    public function accused()
    {
        return $this->belongsTo(CaseAccusedUnion::class, 'id', 'case_id');
    }

    public function union_data()
    {
        return $this->belongsTo(Union::class, "union");
    }

    public function union_branch_data()
    {
        return $this->belongsTo(UnionBranch::class, "union_branch");
    }
}
