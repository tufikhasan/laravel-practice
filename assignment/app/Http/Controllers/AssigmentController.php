<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssigmentController extends Controller {
    // Question 1
    function UserInfo( Request $request ): string{
        $name = $request->input( 'name' );
        return $name;
    }
    // Question 2
    function UserAgent( Request $request ): string{
        $userAgent = $request->header( 'User-Agent' );
        return $userAgent;
    }

    // Question 3
    function queryParameter( Request $request ) {
        $page = $request->query( 'page', null );
        if ( $page !== null ) {
            return $page;
        } else {
            return response()->json( ['query' => 'Page parameter not found'], 400 );
        }
    }
    // Question 4
    function JsonResponse(): JsonResponse{
        $data = array(
            "message" => "Success",
            "data"    => array(
                "name" => "John Doe",
                "age"  => 25,
            ),
        );
        return response()->json( $data );
    }
    // Question 5
    function FileUploads( Request $request ): bool{
        $file = $request->file( 'avatar' );
        $file->move( public_path( 'uploads' ), $file->getClientOriginalName() );
        return true;
    }
    // Question 6
    function SetCookie( Request $request ) {
        $rememberToken = $request->cookie( 'remember_token', null );
        return $rememberToken;
    }
}
