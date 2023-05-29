@extends('layout.app')

@section('content')
    <div class="container">
        <h1>All Products</h1>
        <a href="{{ route('page.create') }}" class="btn btn-primary mb-3">Create New Product</a>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>

                        <td><a href="{{ route('page.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                        <td>

                            <form action="{{ route('page.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
