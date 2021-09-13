<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 'comment','roomId'
    ];

    /**
     * Get the room that owns the review.
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'roomId');
    }

    /**
     * Get the user that owns the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
