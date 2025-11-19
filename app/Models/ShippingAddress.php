<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'is_default',
    ];
    protected $casts = [
        'user_id' => 'integer',

        'full_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'postal_code' => 'string',
        'country' => 'string',

        'is_default' => 'boolean',   // true/false for default address
    ];

}
