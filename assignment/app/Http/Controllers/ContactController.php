<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke( Request $request ) {
        // Validating the request data
        $request->validate( [
            'name'    => 'required|min:2',
            'email'   => 'required|email',
            'message' => 'required|min:20',
        ] );

        if ( $request->filled( ['name', 'email', 'message'] ) ) {
            // Return a JSON response
            return response()->json( [
                'name'         => $request->input( 'name' ),
                'email'        => $request->input( 'email' ),
                'message'      => $request->input( 'message' ),
                'Confirmation' => 'Message sent successfully! We will be in touch very soon.',
            ] );
        }
        return redirect()->back();
    }
}
