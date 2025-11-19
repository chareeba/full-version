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

}
