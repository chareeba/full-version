<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_amount',
        'discount',
        'shipping_cost',
        'payment_status', // 'pending', 'paid', 'failed'
        'order_status',   // 'pending', 'processing', 'completed', 'cancelled'
        'shipping_address_id',
        'payment_method', // 'cash_on_delivery', 'stripe', 'paypal', etc.
    ];

    protected $casts = [
        'user_id' => 'integer',
        'order_number' => 'string',

        'total_amount' => 'decimal:2',
        'discount' => 'decimal:2',
        'shipping_cost' => 'decimal:2',

        'payment_status' => 'string',   // Or enum if you're using Laravel 9+
        'order_status' => 'string',   // Or enum

        'shipping_address_id' => 'integer',

        'payment_method' => 'string',
    ];
}
