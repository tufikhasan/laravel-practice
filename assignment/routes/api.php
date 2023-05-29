<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware( 'auth:sanctum' )->get( '/user', function ( Request $request ) {
    return $request->user();
} );

// Task 5: Controller
Route::resource( 'product', ProductController::class );

// Task 7: Resource Controller
Route::resource( 'post', PostController::class );