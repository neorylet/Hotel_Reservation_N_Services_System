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
             'checkout_date' => 'required|date|after:checkin_date',
             'guests' => 'required|integer',
             'room_id' => 'required|exists:rooms,id',
         ]);
     
         // Check for overlapping bookings for the same room and user
         $overlap = Booking::where('room_id', $validatedData['room_id'])
             ->where('user_id', auth()->id())
             ->where(function ($query) use ($validatedData) {
                 $query->whereBetween('checkin_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                       ->orWhereBetween('checkout_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                       ->orWhere(function ($query) use ($validatedData) {
                           $query->where('checkin_date', '<=', $validatedData['checkin_date'])
                                 ->where('checkout_date', '>=', $validatedData['checkout_date']);
                       });
             })->exists();
     
         if ($overlap) {
             return redirect()->back()->withErrors(['overlap' => 'You already have a booking that overlaps with these dates.']);
         }
     
         // Create the booking
         $booking = Booking::create([
             'user_id' => auth()->id(),
             'room_id' => $validatedData['room_id'],
             'checkin_date' => $validatedData['checkin_date'],
             'checkout_date' => $validatedData['checkout_date'],
             'guests' => $validatedData['guests'],
             'payment_status' => 'pending',
         ]);
     
         session(['booking_id' => $booking->id]);
     
         return redirect()->route('hotel.hotelprofile')->with('success_booking', 'Booking successfully created!');
     }
    }     