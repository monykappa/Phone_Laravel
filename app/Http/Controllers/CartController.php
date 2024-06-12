<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(CartItem $cartItem)
    {
        return view('carts.show', compact('cartItem'));
    }
    public function index()
    {
        $cart = auth()->user()->cart;
        $cartItems = collect();

        if ($cart) {
            $cartItems = $cart->cartItems()->with('product')->get();
            // Uncomment the line below if you need to debug the retrieved data
            // dd($cartItems->toArray());
        }

        return view('carts.index', compact('cartItems'));
    }

    public function store(Request $request, Product $product)
    {
        $user = auth()->user();
        $cart = $user->cart;

        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        $cartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $cart->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
    public function storeOrder()
    {
        $cart = auth()->user()->cart;

        if (!$cart || $cart->cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $order = Order::create(['user_id' => auth()->user()->id]);

        foreach ($cart->cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // Clear the cart after ordering
        $cart->cartItems()->delete();

        return redirect()->route('carts.index')->with('success', 'Order placed successfully!');
    }
    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->route('carts.index')->with('success', 'Product removed from cart successfully!');
    }
}
