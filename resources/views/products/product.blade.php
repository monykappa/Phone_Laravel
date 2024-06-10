<!-- resources/views/products/product.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($products as $product)
        <h1>{{ $product->name }}</h1>
        <p>Description: {{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        @if($product->image_url)
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" width="200">
        @endif
        <!-- Add other product details here -->
    @endforeach 
</div>

@endsection
