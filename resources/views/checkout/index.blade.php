@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container">
        <h2>Checkout Page</h2>
        <p>Number of Items in Cart: {{ $cartItems->count() }}</p>

        <!-- List of Cart Items -->
        <div class="row">
            @foreach ($cartItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Quantity: {{ $item->quantity }}</p>
                            <p class="card-text">Price: ${{ $item->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Your checkout form, payment details, etc. go here -->
    </div>
@endsection
