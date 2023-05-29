@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Delete Product</h1>
        <p>Are you sure you want to delete this product?</p>
        <form action="{{ route('page.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
