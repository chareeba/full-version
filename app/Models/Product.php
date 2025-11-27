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

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

}
