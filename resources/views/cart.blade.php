@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shopping Cart</h1>

    @if (Cart::isEmpty())
    <div class="alert alert-info" role="alert">
        Your cart is empty.
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::getContent() as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>${{ $item->price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ Cart::get($item->id)->getPriceSum() }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-right">Total:</td>
                <td>${{ Cart::getTotal() }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-right">
        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Checkout</a>
    </div>
    @endif
</div>
@endsection
