<!-- resources/views/carts/cart.blade.php -->

<div class="cart-items">
    <h3>Cart Items</h3>
    <ul>
        @foreach ($products as $product)
        {{ $product->name }} - Quantity: {{ $product->pivot->quantity }}
        @endforeach

    </ul>
</div>