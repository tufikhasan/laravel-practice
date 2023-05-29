@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Store Product</h1>
        <form action="{{ route('page.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Store</button>
        </form>
    </div>
@endsection
