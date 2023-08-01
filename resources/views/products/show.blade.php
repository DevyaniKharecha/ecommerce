@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @php 
                $imagePath = $product->image;
                $trimmedImagePath = str_replace("thumbnails/", "", $imagePath);
                @endphp
                <img src="{{ asset('images/' . $trimmedImagePath) }}" class="img-fluid mb-4" alt="{{ $product->name }}">
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p>Price: ${{ $product->price }}</p>
                <p>Description: {{ $product->description }}</p>
                <!-- Add other product details as needed -->

                <!-- Add to Cart form -->
                <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
 
            </div>
        </div>
    </div>
@endsection
