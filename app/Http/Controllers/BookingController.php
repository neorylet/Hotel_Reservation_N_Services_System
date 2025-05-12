<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'guests' => 'required|integer',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Retrieve the room
        $room = Room::findOrFail($validatedData['room_id']);

        // Get all room numbers and check which ones are already booked for the given dates
        $bookedRoomNumbers = Booking::where('room_id', $room->id)
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('checkin_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                      ->orWhereBetween('checkout_date', [$validatedData['checkin_date'], $validatedData['checkout_date']])
                      ->orWhere(function ($query) use ($validatedData) {
                          $query->where('checkin_date', '<=', $validatedData['checkin_date'])
                                ->where('checkout_date', '>=', $validatedData['checkout_date']);
                      });
            })
            ->pluck('room_number')
            ->toArray();

        // Filter available room numbers
        $availableRoomNumbers = array_diff($room->room_numbers ?? [], $bookedRoomNumbers);

        if (empty($availableRoomNumbers)) {
            return redirect()->back()->withErrors(['no_available_room' => 'No available room numbers for this room during the selected dates.']);
        }

        // Assign the first available room number
        $assignedRoomNumber = array_values($availableRoomNumbers)[0];

        // Calculate payment
        $checkinDate = Carbon::parse($validatedData['checkin_date']);
        $checkoutDate = Carbon::parse($validatedData['checkout_date']);
        $nights = $checkinDate->diffInDays($checkoutDate);
        $paymentAmount = $room->room_rate * $nights;

        // Check for overlapping bookings by the same user
        $overlap = Booking::where('room_id', $room->id)
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
            'room_id' => $room->id,
            'room_number' => $assignedRoomNumber,
            'checkin_date' => $validatedData['checkin_date'],
            'checkout_date' => $validatedData['checkout_date'],
            'guests' => $validatedData['guests'],
            'payment_status' => 'pending',
            'payment_amount' => $paymentAmount,
        ]);

        session(['booking_id' => $booking->id]);

        return redirect()->route('hotel.hotelprofile')->with('success_booking', 'Booking successfully created!');
    }
}
