<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Store a new booking in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'guests' => 'required|integer',
            'room_id' => 'required|exists:rooms,id', // Ensure room exists
        ]);
    
        // Create the booking
        $booking = Booking::create([
            'user_id' => auth()->id(), // Assuming the user is logged in
            'room_id' => $request->room_id,
            'checkin_date' => $validatedData['checkin_date'],
            'checkout_date' => $validatedData['checkout_date'],
            'guests' => $validatedData['guests'],
            'payment_status' => 'pending', // Default payment status
        ]);
    
        return redirect()->route('hotel.hotelprofile');
    }

    
}
