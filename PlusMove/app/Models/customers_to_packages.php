<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers_to_packages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id',
        'package_id'
    ];
}
