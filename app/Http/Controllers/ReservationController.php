<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller {

    function reservation( Request $request ) {
        $request->validate( [
            'email'  => 'required|unique:reservations,email',
            'mobile' => 'required|unique:reservations,mobile',
        ] );
        Reservation::create( [
            'event_id' => $request->event_id,
            'name'     => $request->name,
            'email'    => $request->email,
            'mobile'   => $request->mobile,
        ] );

        $notification = [
            'message'    => "Your Reservation Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with( $notification );
    }
}
