<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class ProfileController extends Controller
{
    public function ShowProfile()
    {
        $user = Auth::user();

        // Get all bookings for the logged-in user, including the related room data
        $bookings = Booking::with('room') // eager load the room relation
            ->where('user_id', $user->id)
            ->orderBy('checkin_date', 'desc')
            ->get();

        // Filter current booking (today is within check-in and check-out)
        $today = now()->toDateString();
        $currentBooking = $bookings->first(function ($booking) use ($today) {
            return $booking->checkin_date <= $today && $booking->checkout_date >= $today;
        });

        // Pass the bookings to the view
        return view('hotel.hotelprofile', compact('user', 'bookings', 'currentBooking'));
    }
}
