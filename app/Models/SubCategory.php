<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'status',
        'image',
    ];
    protected $casts = [
        'category_id' => 'integer',  // parent category or null
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'status' => 'boolean',  // active/inactive
        'image' => 'string',
    ];


    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }


}

