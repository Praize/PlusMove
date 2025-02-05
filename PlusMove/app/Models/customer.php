<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customers_name',
        'customers_email',
        'updated_by',
        'created_by',
        'is_active',
    ];
}
