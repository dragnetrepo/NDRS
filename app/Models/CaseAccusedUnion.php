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
        return $this->belongsTo(Union::class);
    }
}
