@extends('layouts.hotel')

@section('content')

<!-- Display success message -->

<!-- Hero Section -->
<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center" data-aos="fade">
        <h1 class="heading mb-3">Profile</h1>
        <ul class="custom-breadcrumbs mb-4">
          <li><a href="/hotel.hotelhome">Home</a></li>
          <li>&bullet;</li>
          <li>Profile</li>
        </ul>
      </div>
    </div>
  </div>

  <a class="mouse smoothscroll" href="#next">
    <div class="mouse-icon">
      <span class="mouse-wheel"></span>
    </div>
  </a>
</section>

<!-- User Info -->
<div class="container py-5">
  <div class="profile-info mb-4">
    @if(Auth::check())
      <div class="user-info">
        <p>Logged in as: <strong>{{ Auth::user()->name }}</strong></p>
      </div>
    @else
      <p>You are not logged in.</p>
    @endif
  </div>

  @if(session('success_booking'))
  <div class="alert alert-success">
    {{ session('success_booking') }}
  </div>
@endif

@if(session('success_order'))
  <div class="alert alert-success">
    {{ session('success_order') }}
  </div>
@endif

  <!-- Bookings Section -->
  <div class="Bookings">
    @if($currentBooking)
        <!-- Current Booking Card -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title">Current Booking</h5>
            </div>
            <div class="card-body">
                <p><strong>Room Name:</strong> {{ $currentBooking->room->room_name }}</p>
                <p><strong>Check-in Date:</strong> {{ $currentBooking->checkin_date }}</p>
                <p><strong>Check-out Date:</strong> {{ $currentBooking->checkout_date }}</p>
            </div>
        </div>
    @endif

    <div class="AllBookings">
        <h3>All Bookings:</h3>
        @foreach($bookings as $booking)
            <!-- Booking Card -->
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="card-title">{{ $booking->room->room_name }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Check-in Date:</strong> {{ $booking->checkin_date }}</p>
                    <p><strong>Check-out Date:</strong> {{ $booking->checkout_date }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('styles')
<style>
  .card-header {
    font-weight: bold;
  }
  .card-body p {
    margin-bottom: 0.5rem;
  }
  .card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .card-title {
    font-size: 1.25rem;
  }
  .Bookings h3 {
    margin-bottom: 20px;
    font-size: 1.5rem;
  }
</style>
@endpush
