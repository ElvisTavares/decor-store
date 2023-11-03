<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'locator',
        'discount',
        'mode_discount',
        'limit',
        'mode_limit',
        'dthr_validity',
        'active'
    ];
}
