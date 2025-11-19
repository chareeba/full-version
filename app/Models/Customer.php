<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'status'
    ];
    protected $casts = [
        'first_name'  => 'string',
        'last_name'   => 'string',
        'email'       => 'string',
        'phone'       => 'string',
        'address'     => 'string',
        'city'        => 'string',
        'state'       => 'string',
        'country'=> 'string',
        'postal_code' => 'string',
        'status'      => 'boolean', // active / inactive
    ];
}
