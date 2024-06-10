<!-- product/edit.blade.php -->

@extends('dashboard.app')

@section('content')
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ $product->color }}">
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $product->year }}">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                @endif
            </div>

            <div class="form-group">
                <label for="storage">Storage:</label>
                <input type="text" class="form-control" id="storage" name="storage" value="{{ $product->storage }}">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>

            <div class="form-group">
                <label for="ram">RAM:</label>
                <input type="text" class="form-control" id="ram" name="ram" value="{{ $product->ram }}">
            </div>

            <div class="form-group">
                <label for="display">Display:</label>
                <input type="text" class="form-control" id="display" name="display" value="{{ $product->display }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection