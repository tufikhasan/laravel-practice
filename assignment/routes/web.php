<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\AuthenticateUsers;
use Illuminate\Support\Facades\Route;

Route::controller( AssignmentController::class )->group( function () {
    // Task 1: Request Validation
    Route::get( '/register', 'getRegisterForm' );
    Route::post( '/register', 'register' );

    // Task 2: Request Redirect
    Route::get( '/home', 'redirectDashboard' );
    Route::get( '/dashboard', 'dashboard' );

} );

//Task 4: Route Middleware
Route::middleware( AuthenticateUsers::class )->group( function () {
    // http://127.0.0.1:8000/profile?email=tufikhasan05@gmail.com&password=12345
    Route::get( '/profile', function () {
        return "Welcome to profile page";
    } );
    // http://127.0.0.1:8000/settings?email=tufikhasan05@gmail.com&password=12345
    Route::get( '/settings', function () {
        return "Welcome to setting page";
    } );
} );

// Task 6: Single Action Controller
Route::post( '/contact', ContactController::class ); //This single action controller route
Route::get( '/contact', function () {
    return view( 'contact' );
} );

// Task 8: Blade Template Engine
Route::get( '/', function () {
    return view( 'welcome' );
} );