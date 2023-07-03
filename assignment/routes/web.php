<?php

use App\Http\Controllers\AssignmentController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get( '/categoryPostCount', function () {
    $categories = Category::all();
    return view( 'category_wise_post_count', compact( 'categories' ) );
} );
Route::delete( '/posts/{id}/delete', [AssignmentController::class, 'softDelete'] );
Route::get( '/softDeletedPosts', [AssignmentController::class, 'softDeletedPosts'] );
Route::get( '/allPostWithTheirCategory', [AssignmentController::class, 'allPostWithTheirCategory'] );
Route::get( '/all_post_with_category', [AssignmentController::class, 'all_post_with_category'] );
Route::get( '/categories/{id}/posts', [AssignmentController::class, 'specificCatPosts'] );

Route::get( '/catLatestPost/{id}', function ( Request $request ) {
    $category = Category::find( $request->id );
    if ( $category ) {
        $latestPost = $category->latestPost();
        return $latestPost;
    } else {
        return response()->json( ['message' => 'Category not found'], 404 );
    }
} );

Route::get( '/eachCategoryPosts', [AssignmentController::class, 'eachCategoryPosts'] );
