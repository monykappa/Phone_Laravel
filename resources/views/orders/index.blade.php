<!-- resources/views/orders/index.blade.php -->
@extends('dashboard.app')

@section('content')
<div class="container mt-5">
    <h1>Orders</h1>
    @if($orders->isEmpty())
    <p>You have no orders.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th> <!-- New column for total price -->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            @foreach($order->orderItems as $orderItem)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $orderItem->product->name }}</td>
                <td>{{ $orderItem->quantity }}</td>
                <td>${{ $orderItem->product->price }}</td>
                <td>${{ $orderItem->product->price * $orderItem->quantity }}</td> <!-- Calculate total price for this item -->
                <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>

    </table>
    @endif
</div>
@endsection