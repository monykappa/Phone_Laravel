@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Cart</h1>
    @if($cartItems->isEmpty())
        <div class="alert alert-info" role="alert">
            Your cart is empty.
        </div>
    @else
        <div class="row">
            @php
                $totalPrice = 0;
            @endphp
            @foreach($cartItems as $cartItem)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $cartItem->product->image) }}" alt="{{ $cartItem->product->name }}" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">{{ $cartItem->product->name }}</h5>
                                    <p class="card-text">Quantity: {{ $cartItem->quantity }}</p>
                                    <p class="card-text">Price: ${{ $cartItem->product->price }}</p>
                                    <!-- Form to remove the product from cart -->
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    // Calculate the total price for this item
                    $totalPrice += $cartItem->product->price * $cartItem->quantity;
                @endphp
            @endforeach
        </div>
        <!-- Display the total price -->
        <div class="text-center">
            <p>Total Price: ${{ $totalPrice }}</p>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg m-5">Place Order</button>
            </form>
        </div>
    @endif
</div>
@endsection
