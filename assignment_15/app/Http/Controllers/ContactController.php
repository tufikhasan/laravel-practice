<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validating the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:20',
        ], [
            'name.min' => 'The name must be at least 2 characters.',
            'message.min' => 'The message must be at least 20 characters.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Get the form data
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Return a JSON response
        return response()->json([
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'Confirmation' => 'Message sent successfully! We will be in touch very soon.',
        ]);
    }
}
