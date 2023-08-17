<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReservationController extends Controller {

    function reservation( Request $request ) {
        $request->validate( [
            'email'  => 'required',
            'mobile' => 'required',
        ] );
        $exists = Reservation::where( 'event_id', $request->event_id )
            ->where( function ( Builder $query ) use ( $request ) {
                $query->where( 'mobile', $request->mobile )
                    ->orWhere( 'email', $request->email );
            } )->first();
        if ( $exists ) {
            $notification = [
                'message'    => "You Are Already Reserved",
                'alert-type' => 'error',
            ];
            return redirect()->back()->with( $notification );
        }
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
