<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseAccusedUnion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function union()
    {
        if ($this->union_sub_branch) {
            return $this->belongsTo(UnionSubBranch::class, "union_sub_branch");
        }
        elseif ($this->union_branch) {
            return $this->belongsTo(UnionBranch::class, "union_branch");
        }

        return $this->belongsTo(Union::class);
    }
}
