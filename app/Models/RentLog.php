<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'laptop_name',
        'rent_date',
        'return_date',
    ];
}
