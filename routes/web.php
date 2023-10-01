<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'pages.frontend.index' );
} );

Route::get( '/dashboard', function () {
    return view( 'pages.dashboard.index' );
} )->middleware( ['auth', 'verified'] )->name( 'dashboard' );

Route::middleware( 'auth' )->group( function () {
    Route::controller( ProfileController::class )->group( function () {
        Route::get( '/profile', 'edit' )->name( 'profile.edit' );
        Route::patch( '/profile', 'update' )->name( 'profile.update' );
        Route::get( '/change/password', 'changePassword' )->name( 'change.password' );
        Route::put( '/update/password', 'updatePassword' )->name( 'password.update' );
    } );

    Route::get( '/products', function () {
        return view( 'pages.dashboard.products.index' );
    } )->name( 'product' );
} );

require __DIR__ . '/auth.php';
