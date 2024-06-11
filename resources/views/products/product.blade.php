@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">${{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
