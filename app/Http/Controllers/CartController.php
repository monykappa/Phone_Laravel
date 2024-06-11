<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // CartController.php

    public function show()
    {
        // Assuming the authenticated user is the one whose cart you want to display
        $user = auth()->user();

        // Retrieve the products in the user's cart
        $products = $user->products;

        // Pass the products to a view for display
        return view('carts.cart', compact('products'));
    }
    

    public function add(Request $request, $id)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Find the product
            $product = Product::find($id);

            // Check if product exists
            if ($product) {
                // Create a new cart entry
                $cart = new Cart();
                $cart->user_id = Auth::id();
                $cart->product_id = $id;
                $cart->save();

                // Redirect back with a success message
                return back()->with('success', 'Product added to cart successfully!');
            } else {
                return back()->with('error', 'Product not found.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to add products to cart.');
        }
    }
}
