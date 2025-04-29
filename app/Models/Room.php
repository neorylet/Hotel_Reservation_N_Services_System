<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Add the room_name to the fillable array to allow mass assignment
    protected $fillable = [
        'room_name',
        'room_type',
        'room_count',
        'room_numbers',
        'room_rate',
        'capacity',
        'room_description',
        'room_front_image',
        'room_images', // Add this if you're saving image paths as JSON
    ];
}

