<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Blogs;
use App\Models\Multi_image;
use Illuminate\Http\Request;

class BlogController extends Controller {
    function allBlog() {
        $blogs = Blogs::latest()->get();
        return view( 'admin.blogs.all_blogs', compact( 'blogs' ) );
    }
    function addBlog() {
        $blogCategories = BlogCategory::orderBy( 'blog_category', 'ASC' )->get();
        return view( 'admin.blogs.add_blog', compact( 'blogCategories' ) );
    }
    function storeBlog( Request $request ) {
        $request->validate(
            ['blog_title' => 'required|string'],
            ['blog_title.required' => 'Blog Title is required']
        );

        $imageUrl = null;

        if ( $request->file( 'blog_image' ) ) {
            $image = $request->file( 'blog_image' );
            $imageUrl = hexdec( uniqid() ) . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'upload/blog' ), $imageUrl );
        }

        Blogs::insert( [
            'blog_title'       => $request->blog_title,
            'blog_category_id' => $request->blog_category_id,
            'blog_tags'        => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image'       => $imageUrl,
        ] );

        $notification = [
            'message'    => "Blog Added Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.blog' )->with( $notification );
    }

    function editBlog( Request $request, $id ) {
        $blog = Blogs::findOrFail( $id );
        $blogCategories = BlogCategory::orderBy( 'blog_category', 'ASC' )->get();
        return view( 'admin.blogs.edit_blog', compact( 'blog', 'blogCategories' ) );
    }

    function updateBlog( Request $request, $id ) {
        $blog = Blogs::findOrFail( $id );
        //request validation
        $request->validate( [
            'blog_title' => 'required|string',
        ], [
            'blog_title.required' => 'Blog title is required',
        ] );
        // update blog
        if ( $request->file( 'blog_image' ) ) {
            $image = $request->file( 'blog_image' );
            if ( $blog->blog_image ) {
                unlink( str_replace( '\\', '/', public_path( 'upload/blog/' . $blog->blog_image ) ) );
            }
            $imageUrl = hexdec( uniqid() ) . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'upload/blog' ), $imageUrl );

            $blog->update( [
                'blog_title'       => $request->blog_title,
                'blog_category_id' => $request->blog_category_id,
                'blog_tags'        => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image'       => $imageUrl,
            ] );
            $notification = [
                'message'    => "Blog Updated With image Successfully",
                'alert-type' => 'success',
            ];
        } else {
            $blog->update( [
                'blog_title'       => $request->blog_title,
                'blog_category_id' => $request->blog_category_id,
                'blog_tags'        => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ] );
            $notification = [
                'message'    => "Blog Updated Without image Successfully",
                'alert-type' => 'success',
            ];
        }

        return redirect()->route( 'all.blog' )->with( $notification );
    }

    function deleteBlog( Request $request, $id ) {
        $blog = Blogs::findOrFail( $id );
        if ( $blog->blog_image ) {
            unlink( str_replace( '\\', '/', public_path( 'upload/blog/' . $blog->blog_image ) ) );
        }
        $blog->delete();

        $notification = [
            'message'    => "Blog Deleted Successfully",
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );
    }

    function blogDetails( Request $request, $id ) {
        $multi_image = Multi_image::where( 'image_type', 'about' )->limit( 6 )->get();
        $blog = Blogs::findOrFail( $id );
        $allBlogs = Blogs::latest()->limit( 5 )->get();
        $categories = BlogCategory::latest()->get();
        return view( 'frontend.blogs.blog_details', compact( 'multi_image', 'blog', 'allBlogs', 'categories' ) );
    }
    function categoryBlogs( Request $request, $id ) {
        $multi_image = Multi_image::where( 'image_type', 'about' )->limit( 6 )->get();
        $category = BlogCategory::findOrFail( $id );
        $categoryBlogs = Blogs::where( 'blog_category_id', $id )->latest()->paginate( 5 );
        $allBlogs = Blogs::latest()->limit( 5 )->get();
        $categories = BlogCategory::latest()->get();
        return view( 'frontend.blogs.category_wise_blog', compact( 'multi_image', 'category', 'categoryBlogs', 'allBlogs', 'categories' ) );
    }
    function blogPage() {
        $multi_image = Multi_image::where( 'image_type', 'about' )->limit( 6 )->get();
        $allBlogs = Blogs::latest()->paginate( 5 );
        $recentBlog = Blogs::latest()->limit( 5 )->get();
        $categories = BlogCategory::latest()->get();
        return view( 'frontend.blogs.blog_page', compact( 'multi_image', 'allBlogs', 'recentBlog', 'categories' ) );
    }
}
