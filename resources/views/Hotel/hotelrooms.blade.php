@extends('layouts.hotel')

@section('content')

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade">
            <h1 class="heading mb-3">Rooms</h1>
            <ul class="custom-breadcrumbs mb-4">
              <li><a href="hotelhome">Home</a></li>
              <li>&bullet;</li>
              <li>Rooms</li>
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
<!-- Hero Section -->

<!-- Rooms Section -->
<section class="section" id="next">
  <div class="container">
  <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Room and Suites</h2>
            <p data-aos="fade-up" data-aos-delay="100">We offer cozy and affordable suites and rooms. With great service, we strive to create a memorable and relaxing stay for every guest. Located in the heart of Davao City, we provide easy access to local attractions and business centers, making us the perfect choice for both leisure and business travelers.</p>
          </div></div>

    <div class="row">
      @foreach($rooms as $room)
      <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up">
      <div class="room">
          <figure class="img-wrap" style="width: 100%; height: 250px; overflow: hidden;">
            <img src="{{ asset('storage/' . $room->room_front_image) }}" alt="{{ $room->room_name }}" style="width: 100%; height: 100%; object-fit: cover;">
          </figure>
          <h3>{{ $room->room_name }}</h3>
          <span class="text-lowercase letter-spacing-1">₱{{ number_format($room->room_rate, 2) }} per night</span><br>
          <p><strong>Room Type: </strong>{{ $room->room_type ?? '-' }}</p>
          <span class="text-lowercase letter-spacing-1" style="color: black;">{{ $room->room_description }}</span>
          <div class="d-flex justify-content-center mt-2">
            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#roomModal-{{ $room->id }}">
              View More
            </a>
          </div>
        </div>
      </div>

      <!-- Modal for this Room -->
      <div class="modal fade" id="roomModal-{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="roomModalLabel-{{ $room->id }}" aria-hidden="true"
     style="position: fixed; left: 0; top: 0; bottom: 0; margin: auto;">
    <div class="modal-dialog" role="document" style="max-width: 700px; transform: none; margin: 20px; height: 104.5%;">
        <div class="modal-content" style="height: 90%;">
            <div class="modal-header">
                <h2 class="modal-title" id="roomModalLabel-{{ $room->id }}">{{ $room->room_name }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                @if($room->room_images)
                    <div id="carouselRoomImages-{{ $room->id }}" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach(json_decode($room->room_images) as $index => $img)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="d-block w-100" alt="Room Image {{ $index + 1 }}" style="height: 400px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselRoomImages-{{ $room->id }}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselRoomImages-{{ $room->id }}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                @endif

                <div class="mt-3">
                    <p><strong>Rate:</strong> ₱{{ number_format($room->room_rate, 2) }} / per night</p>
                    <p><strong>Room Type:</strong> {{ $room->room_type ?? '-' }}</p>
                    <p>{{ $room->room_description }}</p>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal-{{ $room->id }}">
          Book Now
        </button>
            </div>
        </div>
    </div>
</div>

<!-- Booking Modal -->
<div class="modal fade" id="bookingModal-{{ $room->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel-{{ $room->id }}" aria-hidden="true"
     style="position: fixed; right: 700px; top: 0; bottom: 0; margin: auto;">
    <div class="modal-dialog" role="document" style="max-width: 700px; transform: none; margin: 20px; height: 90%; position: relative; right: 0;">
        <div class="modal-content" style="height: 100%;">
            <div class="modal-header">
                <h2 class="modal-title" id="bookingModalLabel-{{ $room->id }}">Book Now</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
            <form action="{{ route('bookings.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Check In</label>
        <input type="date" name="checkin_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Check Out</label>
        <input type="date" name="checkout_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label>How many will be booking?</label>
        <input type="number" name="guests" class="form-control" min="1" required>
    </div>
    <input type="hidden" name="room_id" value="{{ $room->id }}">
    <button type="submit" class="btn btn-success btn-block">Confirm Booking</button>
</form>

            </div>
        </div>
    </div>
</div>




      @endforeach
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
