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
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
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
            <select name="storage" id="storage" class="form-control" required>
                <option value="128">128GB</option>
                <option value="256">256GB</option>
                <option value="512">512GB</option>
                <option value="1024">1TB</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM</label>
            <select name="ram" id="ram" class="form-control" required>
                <option value="4">4GB</option>
                <option value="6">6GB</option>
                <option value="8">8GB</option>
                <option value="12">12GB</option>
                <option value="16">16GB</option>
            </select>
        </div>
        <div class="form-group">
                    <label for="display">Display</label>
                    <select name="display" id="display" class="form-control" required>
                        <option value="5.9">5.9 inches</option>
                        <option value="6">6 inches</option>
                        <option value="6.1">6.1 inches</option>
                        <option value="6.2">6.2 inches</option>
                        <option value="6.3">6.3 inches</option>
                        <option value="6.4">6.4 inches</option>
                        <option value="6.5">6.5 inches</option>
                        <option value="6.6">6.6 inches</option>
                        <option value="6.7">6.7 inches</option>
                        <option value="6.8">6.8 inches</option>
                        <option value="6.9">6.9 inches</option>
                        <option value="7">7 inches</option>
                    </select>
                </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection