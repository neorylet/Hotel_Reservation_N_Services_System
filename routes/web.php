<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;




Route::view('/dashboard', 'dashboard');

Route::resource('services', ServiceController::class);


Route::resource('rooms', RoomController::class);

Route::get('/hotelrooms', [RoomController::class, 'displayHotelRooms'])->name('hotel.rooms');

Route::get('/hotelservices', [ServiceController::class, 'displayHotelServices'])->name('hotel.services');

Route::get('/hotelservices', [ServiceController::class, 'displayHotelMenu'])->name('hotel.menu');





Route::post('/hotelrooms/{room_id}/book', [BookingController::class, 'store'])->name('hotel.booking.store');

Route::resource('services', ServiceController::class);



Route::prefix('dashboard')->group(function () {
    Route::get('/rooms', [RoomController::class, 'dashboardIndex'])->name('dashboard.rooms');
    
    
});



Route::get('/hotelhome', [HomeController::class, "displayHotelHome"])->name('hotel.hotelhome');



Route::get('/hotelprofile', [AuthController::class, 'showProfile'])->name('hotel.profile');

//manage website 

Route::get('/website', function () {
    return view('website.index');
});

Route::get('/websitehome', function () {
    return view('website.websitehome');
});

Route::get('/websiterooms', function () {
    return view('website.websiterooms');
});

Route::get('/websiteservices', function () {
    return view('website.websiteservices');
});
Route::get('/websiteprofile', function () {
    return view('website.websiteprofile');
});
Route::get('/websiteabout', function () {
    return view('website.websiteabout');
});
Route::get('/websitecontact', function () {
    return view('website.websitecontact');
});






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
