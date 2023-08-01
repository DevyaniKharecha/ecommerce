@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Product Listing</h1>
    <p>Number of Items in Cart: {{ Cart::getContent()->count() }}</p>

    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ $product->price }}</p>

                    <div class="row">
                        <div class="col">
                            <!-- View Button -->
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-block">View</a>
                        </div>
                        <div class="col">
                            <!-- Add to Cart Form -->
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <!-- Pagination Links -->
    <div style="margin-left: 40%">
        <div class="col-md-6">
            {{ $products->links() }}
        </div>
    </div><br>
    <!-- Checkout Button -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('cart.checkout') }}" class="btn btn-success btn-block">Checkout</a>
        </div>
    </div>
</div>
@endsection