<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'attribute', // e.g., 'Size'
        'value',     // e.g., 'Large'
        'price_adjustment',
        'stock',
    ];
    protected $casts = [
        'product_id' => 'integer',

        'attribute' => 'string',  // e.g., 'Size', 'Color'
        'value' => 'string',  // e.g., 'Large', 'Red'

        'price_adjustment' => 'decimal:2', // can be positive or negative
        'stock' => 'integer',
    ];

}
