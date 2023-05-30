<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        return Product::all();
    }

    public function create() {
        return Product::all();
    }
    public function store( Request $request ) {
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;

        $product->save();

        return $product;
    }
    public function show( string $id ) {
        return Product::findOrFail( $id );
    }

    public function edit( string $id ) {
        return Product::findOrFail( $id );
    }

    public function update( Request $request, string $id ) {
        $product = Product::findOrFail( $id );

        $product->update( [
            'title' => $request->title,
            'price' => $request->price,
        ] );

        return response()->json( ['message' => 'Successfully updated Product', $product], 200 );
    }
    public function destroy( string $id ) {
        $product = Product::findOrFail( $id );
        $product->delete();
        return response()->json( ['message' => 'Successfully deleted Product'], 202 );
    }
}
