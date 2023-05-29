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
/*

Task 5: Controller
Create a controller called ProductController that handles CRUD operations for a resource called Product. Implement the following methods:
index(): Display a list of all products.
create(): Display the form to create a new product.
store(): Store a newly created product.
edit($id): Display the form to edit an existing product.
update($id): Update the specified product.
destroy($id): Delete the specified product.

Task 6: Single Action Controller
Create a single action controller called ContactController that handles a contact form submission. Implement the __invoke() method to process the form submission and send an email to a predefined address with the submitted data.

Task 7: Resource Controller
Create a resource controller called PostController that handles CRUD operations for a resource called Post. Ensure that the controller provides the necessary methods for the resourceful routing conventions in Laravel.

Task 8: Blade Template Engine
Create a Blade view called welcome.blade.php that includes a navigation bar and a section displaying the text "Welcome to Laravel!".
 */