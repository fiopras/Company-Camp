<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class CampBenefit extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'campe_id',
        'name'
    ];
}
