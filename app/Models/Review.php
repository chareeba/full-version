<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'status', // 'approved', 'pending'
    ];
    protected $casts = [
        'user_id' => 'integer',
        'product_id' => 'integer',

        'rating' => 'integer',  // usually 1-5 stars
        'comment' => 'string',

        'status' => 'string',   // 'approved' | 'pending'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
