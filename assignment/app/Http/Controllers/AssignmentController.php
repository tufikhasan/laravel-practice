<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AssignmentController extends Controller {
    public function allPostWithTheirCategory() {
        $posts = Post::with( 'category' )->get();
        return $posts;
    }

    public function softDelete( Request $request ) {
        $post = Post::find( $request->id );
        if ( !$post ) {
            return response()->json( ['message' => 'Post not found'], 404 );
        }
        $post->delete();
        return response()->json( ['message' => 'Post soft deleted successfully'] );
    }
    public function softDeletedPosts() {
        $softDeletedPosts = Post::softDeletedPosts();
        return $softDeletedPosts;
    }

    public function all_post_with_category() {
        $posts = Post::with( 'category' )->get();
        return view( 'display_all_post_with_category', compact( 'posts' ) );
    }
    public function specificCatPosts( Request $request ) {
        $posts = Post::where( 'category_id', $request->id )->get();
        return $posts;
    }
    public function eachCategoryPosts() {
        $categories = Category::all();
        return view( 'each_category_post_loop', compact( 'categories' ) );
    }
}
