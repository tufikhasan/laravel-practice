<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorepostsRequest;
use App\Http\Requests\UpdatepostsRequest;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /*=======================================================================
   Task 1: Request Validation
   Implement request validation for a registration form that contains the following fields:
   name, email, and password. Validate the following rules:.
    ========================================================================*/
    public function validation(StorepostsRequest $request)
    {
        // If the request passes validation, you can access the validated data
        $validatedData = $request->validated();

        return response()->json([
            'data' => $validatedData,
            'message' => 'Validation successful',
        ]);
    }

    /*=======================================================================
    task 2. Create a route /home that redirects to /dashboard using a 302 redirect.
    ========================================================================*/
    // public function home()
    // {
    //     return redirect('/dashboard');
    // }
    // public function dashboard()
    // {
    //     return "I'm dashboard redirected from home";
    // }

    /*====================================================================================
    task 3.Task 3: Global Middleware

    Create a global middleware that logs the request method and URL for every incoming request.
    Log the information to the Laravel log file.

    Need to check the log in storage/logs/laravel.log file to see the logs of my all routes.
    ====================================================================================*/
    public function checkLog()
    {
        return "please check the logs in laravel.log file";
    }

     /*====================================================================================
    Task 4: Route Middleware
    Create a route group for authenticated users only. This group should include routes for /profile and /settings.
    Apply a middleware called AuthMiddleware to the route group to ensure only authenticated users can access these routes.
    ====================================================================================*/
    public function profile(){
        return "Profile has been validated through AuthMiddleware ";
    }
    public function settings(){
        return "Settings has been validated through AuthMiddleware ";
    }
}



