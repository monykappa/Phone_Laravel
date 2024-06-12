@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Order #{{ $order->id }}</h1>
    <p><strong>Total Price:</strong> ${{ $order->total_price }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <ul>
        @foreach($order->items as $item)
            <li>{{ $item->product->name }} ({{ $item->quantity }} x ${{ $item->price }})</li>
        @endforeach
    </ul>
    <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
