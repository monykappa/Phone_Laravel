<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p><strong>Price:</strong> ${{ $product->price }}</p>
            <p><strong>Color:</strong> {{ $product->color }}</p>
            <p><strong>Year:</strong> {{ $product->year }}</p>
            <p><strong>Storage:</strong> {{ $product->storage }} GB</p>
            <p><strong>RAM:</strong> {{ $product->ram }} GB</p>
            <p><strong>Display:</strong> {{ $product->display }}</p>

            <!-- Add to Cart Button -->
            <form action="{{ route('cart.add', $product->id) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
