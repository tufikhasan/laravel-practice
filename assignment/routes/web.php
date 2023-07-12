<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::controller( BlogController::class )->group( function () {
    Route::get( '/', 'blogPage' )->name( 'home' );
    Route::get( '/blog/details/{id}', 'blogDetails' )->name( 'blog.details' );

    //Ajax route
    Route::get( '/allBlog', 'allBlog' );
    Route::post( '/comment', 'comment' );
} );
