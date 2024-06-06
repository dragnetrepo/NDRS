<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnionBranch extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(UnionUserRole::class, 'branch_id');
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }
}
