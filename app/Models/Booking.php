<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'bookings';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'room_id',
        'checkin_date',
        'checkout_date',
        'guests',
        'payment_status',
    ];

    // Define the relationship with User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Room
    public function room() {
        return $this->belongsTo(Room::class);
    }
}
