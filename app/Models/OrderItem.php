<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
     protected $fillable = [
        'order_id',
        'product_id',
        'variant_id',
        'quantity',
        'price',
        'subtotal',
    ];
    protected $casts = [
    'order_id'   => 'integer',
    'product_id' => 'integer',
    'variant_id' => 'integer',
    'quantity'   => 'integer',
    'price'      => 'decimal:2',
    'subtotal'   => 'decimal:2',
];
}
