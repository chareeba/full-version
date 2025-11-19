<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'sku',
        'price',
        'discount_price',
        'stock',
        'short_description',
        'long_description',
        'status', // 'active' / 'inactive'
        'featured', // boolean
    ];
    protected $casts = [
        'category_id' => 'integer',
        'sub_category_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'sku' => 'string',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
        'short_description' => 'string',
        'long_description' => 'string',
        'status' => 'boolean',   // active / inactive
        'featured' => 'boolean',   // true / false
    ];

}
