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

        // Render the view and pass the products data to it
        return view('products.product', compact('products'));
    }




    public function create()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Create a new instance of the Product model
        $product = new Product();

        // Render the create form view and pass the product and products data to it
        return view('dashboard.create', compact('product', 'products'));
    }
    public function edit($id)
    {
        // Retrieve the product from the database
        $product = Product::find($id);

        // Pass the product to the view
        return view('dashboard.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the product from the database
        $product = Product::find($id);

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'storage' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'ram' => 'required|integer',
            'display' => 'required|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Update the product
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->year = $validatedData['year'];
        $product->storage = $validatedData['storage'];
        $product->price = $validatedData['price'];
        $product->ram = $validatedData['ram'];
        $product->display = $validatedData['display'];
        $product->save();

        // Redirect the user after updating the product
        return redirect()->route('products.create')->with('success', 'Product updated successfully!');
    }

    public function show($id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($id);
    
        // Pass the product to the view
        return view('products.show', compact('product'));
    }
    

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'year' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'storage' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'ram' => 'required|integer',
            'display' => 'required|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create and save the new product
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->color = $validatedData['color'];
        $product->year = $validatedData['year'];
        $product->image = $imagePath;
        $product->storage = $validatedData['storage'];
        $product->price = $validatedData['price'];
        $product->ram = $validatedData['ram'];
        $product->display = $validatedData['display'];
        $product->save();

        // Redirect the user after adding the product
        return redirect()->route('products.create')->with('success', 'Product added successfully!');
    }
}
