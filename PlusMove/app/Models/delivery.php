<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'drivers_id',
        'customers_id',
        'packages_id',
        'delivery_status',
    ];
}
