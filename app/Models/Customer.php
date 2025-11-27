<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'status'
    ];
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'country' => 'string',
        'postal_code' => 'string',
        'status' => 'boolean', // active / inactive
    ];

    // Relationships
    public function orders()
    {
        // If you add a `customer_id` on orders, this will return related orders
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function reviews()
    {
        // If reviews are made by customers (instead of users), this will return them
        return $this->hasMany(Review::class, 'user_id');
    }
}
