@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Update Product</h1>
        @if(isset($product))
        <form action="{{ route('page.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $product->description }}">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
            </div>
             <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $product->quantity }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
        @else
        <p>Product not found.</p>
    @endif
    </div>
@endsection
