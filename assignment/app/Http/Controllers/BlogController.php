<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller {
    function blogPage() {
        return view( 'index' );
    }
    function blogDetails( Request $request ) {
        $blog = Blog::with( 'comment' )->find( $request->id );
        return view( 'blog_details', compact( 'blog' ) );
    }
    function allBlog() {
        $blogs = Blog::latest()->get();
        return $blogs;
    }
    function comment( Request $request ) {
        Comment::create( [
            'blog_id' => $request->blog_id,
            'name'    => $request->name,
            'email'   => $request->email,
            'comment' => $request->comment,
        ] );
        return response()->json( ['status' => 'success'], 201 );
    }
}
