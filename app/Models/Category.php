<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'image'
    ];
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'status' => 'boolean', // Usually active/inactive
        'image' => 'string',
    ];

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
