<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller {
    function getExcerptDescription() {
        $posts = DB::table( 'posts' )->select( 'excerpt', 'description' )->get();
        return $posts;
    }
    function firstRecordDescription() {
        $posts = DB::table( 'posts' )->where( 'id', '=', '2' )->first();
        return $posts->description;
    }
    function getDescription() {
        $posts = DB::table( 'posts' )->where( 'id', 2 )->pluck( 'description' );
        return $posts;
    }
    function getAllTitle() {
        $posts = DB::table( 'posts' )->select( 'title' )->get();
        return $posts;
    }
    function insertPost() {
        $result = DB::table( 'posts' )->insert( [
            'title'        => 'X',
            'slug'         => 'x',
            'excerpt'      => 'excerpt',
            'description'  => 'description',
            'is_published' => true,
            'min_to_read'  => 2,
        ] );
        return $result;
    }
    function update() {
        $affectedRows = DB::table( 'posts' )->where( 'id', 2 )
            ->update( [
                'excerpt'     => 'Laravel 10',
                'description' => 'Laravel 10',
            ] );

        return $affectedRows;
    }
    function delete() {
        $affectedRows = DB::table( 'posts' )->where( 'id', 3 )->delete();
        return $affectedRows;
    }
    function getPostByMinRead() {
        $posts = DB::table( 'posts' )->whereBetween( 'min_to_read', [1, 5] )->get();
        return $posts;
    }
    function increments() {
        $posts = DB::table( 'posts' )->where( 'id', 4 )->increment( 'min_to_read', 1 );
        return $posts;
    }
}

// $hasPublishedPosts = DB::table( 'posts' )->where( 'is_published', 'true' )->exists();
// $noPublishedPosts = DB::table( 'posts' )->where( 'is_published', 'false' )->doesntExist();