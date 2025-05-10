@extends('layouts.hotel')

@section('content')
<div class="container">
    <h2>Confirm Order for: {{ $service->service_name }}</h2>
    <p>Price per item: ₱{{ $service->price }}</p>

<form action="{{ route('order.submit') }}" method="POST">
    @csrf
    <input type="hidden" name="service_id" value="{{ $service->id }}">
    <input type="number" name="quantity" value="1" min="1" required>
    <button type="submit">Confirm Order</button>
</form>
</div>
@endsection
