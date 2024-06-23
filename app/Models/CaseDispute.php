<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseDispute extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public const ARRAY_OF_CASE_STATUS = [
        "internally resolved", "concilliation", "voting for panel", "resolved", "internal resolution", "pending approval", "arbitration", "court decision"
    ];

    public const ARRAY_OF_ALLOWED_CASE_STATUS_UPDATE = [
        "internally resolved", "concilliation", "voting for panel", "resolved", "internal resolution", "arbitration", "court decision"
    ];

    public const ARRAY_OF_CASE_TYPES = [
        "wage and benefit disputes", "work hours and leave", "workplace health and safety", "discrimination and harassment", "unfair dismissals", "contractual disputes",
        "union representation issues", "workplace restructuring", "employee rights and entitlement", "management and employee relation"
    ];

    public function scopePending($query)
    {
        return $query->where("status", "pending approval");
    }

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
