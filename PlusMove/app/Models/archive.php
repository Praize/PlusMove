<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archive extends Model
{
    use HasFactory;

    public $table = 'archive';
    protected $fillable = [
        'package_id',
        'driver_name',
        'customer_name',
        'package_name',
        'created_at',
        'updated_at'
    ];
}
