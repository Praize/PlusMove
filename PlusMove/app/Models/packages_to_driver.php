<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packages_to_driver extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'driver_id',
        'package_id'
    ];
}
