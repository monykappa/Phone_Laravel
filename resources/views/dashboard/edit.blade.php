@extends('dashboard.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" value="{{ $product->color }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $product->year }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($product->image)
            <img src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}" width="50">
            @endif
        </div>
        <div class="form-group">
            <label for="storage">Storage</label>
            <input type="number" name="storage" id="storage" class="form-control" value="{{ $product->storage }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="ram">RAM</label>
            <input type="number" name="ram" id="ram" class="form-control" value="{{ $product->ram }}" required>
        </div>
        <div class="form-group">
            <label for="display">Display</label>
            <input type="text" name="display" id="display" class="form-control" value="{{ $product->display }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection