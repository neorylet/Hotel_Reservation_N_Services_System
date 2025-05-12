@extends('layouts.hotel')

@section('content')

<!-- Hero Section -->
<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg); background-size: cover; background-position: center;" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
      <div class="col-md-10 text-center" data-aos="fade">
        <h1 class="heading text-light mb-3">Profile</h1>
        <ul class="custom-breadcrumbs mb-4">
          <li><a href="/hotel.hotelhome" class="text-light">Home</a></li>
          <li>&bullet;</li>
          <li class="text-light">Profile</li>
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



<div class="container py-5">
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
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Information</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ Auth::user()->name }}</td> <!-- Display current logged-in user's name -->
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ Auth::user()->email }}</td> <!-- Display current logged-in user's email -->
                </tr>
                <!-- You can add more user details if needed -->
            </tbody>
        </table>
    </div>
</div>

                <!-- Make sure that the very first one at the top of this list is labeled current booking -->

<div class="container py-5">
  <h1> All Bookings</h1>
    <!-- Current Booking Table -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Room Name</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Payment Status</th>
                    <th>Total Payment</th>
                    <th>Orders</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->room->room_name }}</td>
                        <td>{{ $booking->checkin_date }}</td>
                        <td>{{ $booking->checkout_date }}</td>
                        <td>{{ $booking->payment_status }}</td>
                        <td>₱{{ $booking->payment_amount }}</td>
                        <td>
                            <!-- Button to toggle the order list -->
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#orders-{{ $booking->id }}" aria-expanded="false" aria-controls="orders-{{ $booking->id }}">
                                View Orders ({{ $booking->orders->count() }})
                            </button>

                            <!-- Collapsible Order List -->
                            <div class="collapse" id="orders-{{ $booking->id }}">
                                <div class="mt-3">
                                    @if($booking->orders && $booking->orders->count())
                                        @foreach($booking->orders as $order)
                                            <div class="mb-2">
                                                <strong>Service:</strong> {{ $order->service->service_name ?? 'N/A' }}<br>
                                                <strong>Quantity:</strong> {{ $order->quantity }}<br>
                                                <strong>Total Price:</strong> ₱{{ $order->total_price }}<br>
                                                <strong>Customer Name:</strong> {{ $order->customer_name }}<br>
                                                <hr>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No orders associated with this booking.</p>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection