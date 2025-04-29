@extends('layouts.hotel')

@section('content')

<section class="site-hero inner-page overlay" style="background-image: url(images/hero_4.jpg)" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row site-hero-inner justify-content-center align-items-center">
    <h1 class="heading mb-3">Profile</h1>
    <div class="profile-info">
            <!-- Check if the user is authenticated -->
            @if(Auth::check())
                <div class="user-info">
                    <p>Logged in as: <strong>{{ Auth::user()->name }}</strong></p>
                </div>
            @else
                <p>You are not logged in.</p>
            @endif
          </div>
    </div>
  </div>
  <a class="mouse smoothscroll" href="#next">
    <div class="mouse-icon"><span class="mouse-wheel"></span></div>
  </a>
</section>


