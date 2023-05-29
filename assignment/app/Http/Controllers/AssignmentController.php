<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller {
    function register( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name'     => 'required|string|min:2',
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ] );
        if ( $validator->fails() ) {
            return response()->json( ['errors' => $validator->errors()], 422 );
        }
        return response()->json( ['message' => 'success'] );
    }
}
