<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseFolder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function documents()
    {
        return $this->hasMany(CaseDocument::class, "folder_id");
    }
}
