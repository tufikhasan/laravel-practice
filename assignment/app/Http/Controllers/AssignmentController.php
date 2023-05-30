<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentController extends Controller {
    // Task 1: Request Validation
    function getRegisterForm() {
        return view( 'register_form' );
    }
    function register( Request $request ) {
        $request->validate( [
            'name'     => 'required|string|min:2',
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ] );
        if ( $request->filled( ['name', 'email', 'password'] ) ) {
            return redirect( '/' );
        }
        return redirect()->back();
    }
    // Task 2: Request Redirect
    function redirectDashboard() {
        return redirect( '/dashboard', 302 );
    }
    function dashboard() {
        return 'Welcome to Dashboard';
    }

}
