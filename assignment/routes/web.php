<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'welcome' );
} );
/*
Task 1: Request Validation
Implement request validation for a registration form that contains the following fields: name, email, and password. Validate the following rules:
name: required, string, minimum length 2.
email: required, valid email format.
password: required, string, minimum length 8.
 */
Route::post( '/register', [AssignmentController::class, 'register'] );

/*

Task 2: Request Redirect
Create a route /home that redirects to /dashboard using a 302 redirect.

Task 3: Global Middleware
Create a global middleware that logs the request method and URL for every incoming request. Log the information to the Laravel log file.

Task 4: Route Middleware
Create a route group for authenticated users only. This group should include routes for /profile and /settings. Apply a middleware called AuthMiddleware to the route group to ensure only authenticated users can access these routes.

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