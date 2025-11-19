<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_method',
        'transaction_id',
        'amount',
        'status',
    ];
    protected $casts = [
        'order_id' => 'integer',
        'payment_method' => 'string',     // e.g., 'stripe', 'paypal', 'cod'
        'transaction_id' => 'string',
        'amount' => 'decimal:2',
        'status' => 'string',     // or boolean if it's 0/1
    ];

}
