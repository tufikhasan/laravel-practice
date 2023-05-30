<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        return Post::all();
    }

    public function create() {
        return Post::all();
    }
    public function store( Request $request ) {
        $posts = new Post;
        $posts->title = $request->title;
        $posts->description = $request->description;

        $posts->save();

        return $posts;
    }
    public function show( string $id ) {
        return Post::findOrFail( $id );
    }

    public function edit( string $id ) {
        return Post::findOrFail( $id );
    }

    public function update( Request $request, string $id ) {
        $posts = Post::findOrFail( $id );

        $posts->update( [
            'title'       => $request->title,
            'description' => $request->description,
        ] );

        return response()->json( ['message' => 'Successfully updated Post', $posts], 200 );
    }
    public function destroy( string $id ) {
        $posts = Post::findOrFail( $id );
        $posts->delete();
        return response()->json( ['message' => 'Successfully deleted Post'], 202 );
    }
}
