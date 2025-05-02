@extends('layouts.hotel')

@section('content')
<header class="site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo">
                <a href="">
                    <img src="{{ asset('images/casalogo.jpg') }}" alt="Casa Leticia Boutique Hotel Logo" width="200" height="auto">
                </a>
            </div>
            <div class="col-6 col-lg-8">
                <nav role="navigation">
                    <div class="nav-links">
                        <a href="/hotelhome">Home</a>
                        <a href="/hotelrooms">Rooms</a>
                        <a href="/services">Services</a>
                        <a href="/hotelprofile">Profile</a>
                        <a href="/contact">Contact</a>
                        <a href="/about">About</a>
                        <a href="#" data-toggle="modal" data-target="#authModal">Log In</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
            <div class="col-md-10 text-center" data-aos="fade">
                <h1 class="heading mb-3">Services</h1>
                <ul class="custom-breadcrumbs mb-4">
                    <li><a href="hotelhome">Home</a></li>
                    <li>&bullet;</li>
                    <li>Services</li>
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

<section class="section blog-post-entry bg-light" id="next">
    <h2 class="heading text-black text-center" data-aos="fade">Services</h2>
    <div class="container">
    <div class="row">

<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#">Location and Accessibility</a></h2>
      <p>Located in the heart of Davao City <br> Inside city center (Pin icon) <br> 910 meters to public transportation (Bus icon)</p>

    </div>
  </div>

</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#">Key Amenities/Services</a></h2>
      <p>Front desk [24-hour] <br> Great Breakfast </p>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_3.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#">Core Inclusions</a></h2>
      <p>Free Wi-Fi <br> Free parking | Breakfast <br> Front desk [24-hour] | Room service <br> Restaurant | Business center <br> Luggage storage</p>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">

  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#"> Additional Amenities </a></h2>
      <p>Hair Dryer,
Non-Smoking Facility,
Restaurant,
Room Service,
Refrigerator,
Cable/Satellite TV,
In room safe,
Internet Access - Free Public Access,
Daily Housekeeping,
Hygiene Certification,
Meeting/Banquet Facilities,
Newspapers,
Seating Area,
Ironing Amenities,
Separate Shower/Bathtub, </p>
    </div>
  </div>

</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="200">
  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#">And More Amenities</a></h2>
      <p>
Air Conditioning,
Breakfast - Free,
Facilities For Disabled Guests Available,
Luggage Storage & Lockers,
Desk/Workspace Available,
Elevator,
First Aid Kit Available,
Tour Services,
Parking - Free,
Smoke Alarms,
Toiletries Provided,
Non-Smoking Rooms Available,
Parking - On-Site,
Telephone,
CCTV security in common areas,
Room Towels Provided.
      </p>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="300">
  <div class="media media-custom d-block mb-4 h-100">
    <a href="#" class="mb-4 d-block"><img src="images/img_2.jpg" alt="Image placeholder" class="img-fluid"></a>
    <div class="media-body">
      <h2 class="mt-0 mb-3"><a href="#">Convenience and Emphasis on Accessibility and Safety:</a></h2>
      <p>
Facilities For Disabled Guests Available <br>
First Aid Kit Available <br>
Smoke Alarms <br>
CCTV security in common areas <br>
Telephone <br>
Room Towels Provided <br>
</p>
    </div>
  </div>
</div>
</div>
    </div>
</section>

<section class="section bg-image overlay" style="background-image: url('images/hero_3.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7">
                <h2 class="heading text-white" data-aos="fade">Our Restaurant Menu</h2>
                <p class="text-white" data-aos="fade" data-aos-delay="100">Click Services to access more details and to order on our restaurant</p>
            </div>
        </div>

        <div class="food-menu-tabs" data-aos="fade">
    <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active letter-spacing-2" id="mains-tab" data-toggle="tab" href="#mains" role="tab">Mains</a>
        </li>
        <li class="nav-item">
            <a class="nav-link letter-spacing-2" id="desserts-tab" data-toggle="tab" href="#desserts" role="tab">Desserts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link letter-spacing-2" id="drinks-tab" data-toggle="tab" href="#drinks" role="tab">Drinks</a>
        </li>
    </ul>

    <div class="tab-content py-5" id="myTabContent">
        {{-- Mains --}}
        <div class="tab-pane fade show active text-left" id="mains" role="tabpanel">
            <div class="row">
                @forelse($mains as $main)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <div style="display: flex; align-items: flex-end; gap: 5px;">
                            <img src="{{ asset('storage/' . $main->service_front_image) }}" alt="{{ $main->service_name }}" class="img-fluid d-block" style="width: 250px; height: 250px; object-fit: cover;">
                            <div>
                                <span class="d-block text-primary h4 mb-1">₱{{ $main->price }}</span>
                                <h3 class="text-white" style="margin: 0;"><a href="#" class="text-white">{{ $main->service_name }}</a></h3>
                            </div>
                        </div>
                        <p class="text-white text-opacity-7 mt-3">{{ $main->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Desserts --}}
        <div class="tab-pane fade text-left" id="desserts" role="tabpanel">
            <div class="row">
                @forelse($desserts as $dessert)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <div style="display: flex; align-items: flex-end; gap: 5px;">
                            <img src="{{ asset('storage/' . $dessert->service_front_image) }}" alt="{{ $dessert->service_name }}" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                            <div>
                                <span class="d-block text-primary h4 mb-1">₱{{ $dessert->price }}</span>
                                <h3 class="text-white"><a href="#" class="text-white">{{ $dessert->service_name }}</a></h3>
                            </div>
                        </div>
                        <p class="text-white text-opacity-7">{{ $dessert->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Drinks --}}
        <div class="tab-pane fade text-left" id="drinks" role="tabpanel">
            <div class="row">
                @forelse($drinks as $drink)
                <div class="col-md-6">
                    <div class="food-menu mb-5">
                        <div style="display: flex; align-items: flex-end; gap: 5px;">
                            <img src="{{ asset('storage/' . $drink->service_front_image) }}" alt="{{ $drink->service_name }}" class="img-fluid" style="width: 250px; height: 250px; object-fit: cover;">
                            <div>
                                <span class="d-block text-primary h4 mb-1">₱{{ $drink->price }}</span>
                                <h3 class="text-white"><a href="#" class="text-white">{{ $drink->service_name }}</a></h3>
                            </div>
                        </div>
                        <p class="text-white text-opacity-7">{{ $drink->service_description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white">Nothing Listed</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>

    </div>
</section>
@endsection
