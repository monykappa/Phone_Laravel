@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Color</th>
                <th>Year</th>
                <th>Image</th>
                <th>Storage</th>
                <th>Price</th>
                <th>RAM</th>
                <th>Display</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through products and display each row in the table -->
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->year }}</td>
                <td>
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                    @endif
                </td>
                <td>{{ $product->storage }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->ram }}</td>
                <td>{{ $product->display }}</td>
                <td>
                    <!-- Add the edit button -->
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container">
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="storage">Storage</label>
            <input type="number" name="storage" id="storage" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM</label>
            <input type="number" name="ram" id="ram" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="display">Display</label>
            <input type="text" name="display" id="display" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection