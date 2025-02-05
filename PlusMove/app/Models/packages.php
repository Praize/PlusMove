<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'package_weight',
        'updated_by',
        'created_by',
        'is_active'
    ];
}
