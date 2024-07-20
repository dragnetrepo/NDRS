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
        "case opened", "case approved", "case in mediation", "case in conciliation", "case in arbitration", "case with board of enquiry", "case in nic", "nic judgement made", "case closed (resolved)", "case closed (not resolved)"
    ];

    public const ARRAY_OF_ALLOWED_CASE_STATUS_UPDATE = [
        "case in mediation", "case in conciliation", "case in arbitration", "case with board of enquiry", "case in nic", "nic judgement made", "case closed (resolved)", "case closed (not resolved)"
    ];

    public const ACTIVE_CASE_STATUSES = [
        "case approved", "case in mediation", "case in conciliation", "case in arbitration", "case with board of enquiry", "case in nic", "nic judgement made",
    ];

    public const RESOLVED_CASE_STATUSES = [
        "case closed (resolved)", "case closed (not resolved)"
    ];

    public const PENDING_APPROVAL_CASE_STATUSES = [
        "case opened",
    ];

    public const ARRAY_OF_CASE_TYPES = [
        "wage and benefit disputes", "work hours and leave", "workplace health and safety", "discrimination and harassment", "unfair dismissals", "contractual disputes",
        "union representation issues", "workplace restructuring", "employee rights and entitlement", "management and employee relation"
    ];

    public const ARRAY_OF_ORGANIZATION_ADMINS = [
        "employers", "union branch admin", "national union admin"
    ];

    public function scopePending($query)
    {
        return $query->whereIn("status", CaseDispute::PENDING_APPROVAL_CASE_STATUSES);
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
        if ($this->union_sub_branch) {
            return $this->belongsTo(UnionSubBranch::class, "union_sub_branch");
        }
        elseif ($this->union_branch) {
            return $this->belongsTo(UnionBranch::class, "union_branch");
        }
        elseif ($this->union) {
            return $this->belongsTo(Union::class, "union");
        }

        return $this->belongsTo(User::class, "created_by");
    }

    public function union_branch_data()
    {
        return $this->belongsTo(UnionBranch::class, "union_branch");
    }
}
