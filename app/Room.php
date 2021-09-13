<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'size', 'capacity', 'services', 'image', 'description'
    ];

    /**
     * Get the reviews for the blog post.
     */
    public function reviews()
    {
        return $this->hasMany(Feedback::class, 'roomId');
    }

    /**
     * Get the bookings for the blog post.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'roomId');
    }
}
