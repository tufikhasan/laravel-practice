<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        //return ProductResource::collection(Product::all());
        $products = Post::all();
        return view( '.index', compact( 'products' ) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( '.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $product = new Post;
        $product->title = $request->title;
        $product->description = $request->description;

        $product->save();

        return redirect()->route( '.index' );
    }

    /**
     * Display the specified resource.
     */
    public function show( string $id ) {
        $product = Post::findOrFail( $id );
        return view( '.show', compact( 'product' ) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id ) {
        $product = Post::findOrFail( $id );
        return view( '.edit', compact( 'product' ) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, string $id ) {
        $product = Post::findOrFail( $id );

        $product->update( [
            'title'       => $request->title,
            'description' => $request->description,
        ] );

        return redirect()->route( '.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id ) {
        $product = Post::findOrFail( $id );
        $product->delete();
        return redirect()->route( '.index' );
    }
}
