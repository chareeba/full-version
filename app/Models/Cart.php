<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'session_id', // For guest users
    'total',
];

protected $casts = [
    'user_id'   => 'integer',
    'session_id'=> 'string',   // Guest session token / ID
    'total'     => 'decimal:2' // Money value
];
}
