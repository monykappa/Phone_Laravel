<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();
        
        // Render the product.blade.php view and pass the products data to it
        return view('products.product', compact('products'));
    }
    public function create()
    {
        $products = Product::all();
        return view('dashboard.create', compact('products'));
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            // Add validation rules for other fields
        ]);
    
        // Create and save the new product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        // Set other product attributes
        $product->save();
    
        // Redirect the user after adding the product
        return redirect()->route('home')->with('success', 'Product added successfully!');
    }
    
}
