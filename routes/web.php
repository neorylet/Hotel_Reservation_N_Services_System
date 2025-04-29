<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;



Route::view('/dashboard', 'dashboard');

Route::resource('rooms', RoomController::class);

Route::get('/hotelrooms', [RoomController::class, 'displayHotelRooms'])->name('hotel.rooms');

Route::get('/hotelhome', [RoomController::class, 'displayHotelHome'])->name('hotel.home');

Route::post('/hotelrooms/{room_id}/book', [BookingController::class, 'store'])->name('hotel.booking.store');

Route::resource('services', ServiceController::class);



Route::prefix('dashboard')->group(function () {
    Route::get('/rooms', [RoomController::class, 'dashboardIndex'])->name('dashboard.rooms');
    
});



Route::get('/hotelhome', [AuthController::class, "displayHotelHome"])->name('hotel.hotelhome');
Route::post('/hotelhome', [AuthController::class, "landing"])->name("landing.post");

Route::get('/hotelprofile', [AuthController::class, 'showProfile'])->name('hotel.profile');





// Public authentication routes
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");

Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");

Route::get('password/reset', [AuthController::class, "password.request"])->name('password.request');

Route::middleware('auth')->group(function () {


    Route::get('/room', function () {
        return view('room');
    });

    Route::get('/payment', function () {
        return view('payment');
    });

    Route::get('/contacts', function () {
        return view('contacts');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('bookings', BookingController::class);
});
