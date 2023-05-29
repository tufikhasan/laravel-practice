<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //return ProductResource::collection(Product::all());
        $products = Product::all();
        return view( 'product.index', compact( 'products' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'product.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $product = new Product;
        $product->title = $request->title;
        $product->price = $request->price;

        $product->save();

        return redirect()->route( 'product.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        $product = Product::findOrFail( $id );
        return view( 'product.show', compact( 'product' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        $product = Product::findOrFail( $id );
        return view( 'product.edit', compact( 'product' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        $product = Product::findOrFail( $id );

        $product->update( [
            'title' => $request->title,
            'price' => $request->price,
        ] );

        return redirect()->route( 'product.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        $product = Product::findOrFail( $id );
        $product->delete();
        return redirect()->route( 'product.index' );
    }
}
