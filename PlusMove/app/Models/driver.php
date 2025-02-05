<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        'driver_name',
        'driver_email',
        'driver_phonenumber',
        'is_active'
    ];
}
