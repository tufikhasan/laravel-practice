<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller {
    function allevent() {
        $events = Event::where( 'user_id', Auth::id() )->latest()->get();
        return view( 'admin.events.all_events', compact( 'events' ) );
    }
    function addevent() {
        $eventCategories = EventCategory::where( 'user_id', Auth::id() )->orderBy( 'name', 'ASC' )->get();
        return view( 'admin.events.add_event', compact( 'eventCategories' ) );
    }
    function storeevent( Request $request ) {
        $request->validate(
            [
                'title'             => 'required|string',
                'event_category_id' => 'required',
                'description'       => 'required',
                'date'              => 'required',
                'time'              => 'required',
                'location'          => 'required',
            ],
            [
                'title.required'             => 'Event Title is required',
                'event_category_id.required' => 'Event Category is required',
            ]
        );

        $imageUrl = null;

        if ( $request->file( 'image' ) ) {
            $image = $request->file( 'image' );
            $imageUrl = hexdec( uniqid() ) . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'upload/event' ), $imageUrl );
        }

        Event::create( [
            'user_id'           => Auth::id(),
            'title'             => $request->title,
            'event_category_id' => $request->event_category_id,
            'description'       => $request->description,
            'date'              => $request->date,
            'time'              => $request->time,
            'location'          => $request->location,
            'image'             => $imageUrl,
        ] );

        $notification = [
            'message'    => "Event Added Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.event' )->with( $notification );
    }

    function editevent( Request $request ) {
        $event = Event::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first();
        $eventCategories = EventCategory::where( 'user_id', Auth::id() )->orderBy( 'name', 'ASC' )->get();
        return view( 'admin.events.edit_event', compact( 'event', 'eventCategories' ) );
    }

    function updateevent( Request $request ) {
        $event = Event::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first();
        //request validation
        $request->validate( [
            'title' => 'required|string',
        ], [
            'title.required' => 'Event title is required',
        ] );
        // update event
        if ( $request->file( 'image' ) ) {
            $image = $request->file( 'image' );
            if ( $event->image ) {
                unlink( str_replace( '\\', '/', public_path( 'upload/event/' . $event->image ) ) );
            }
            $imageUrl = hexdec( uniqid() ) . '.' . $image->getClientOriginalExtension();
            $image->move( public_path( 'upload/event' ), $imageUrl );

            $event->update( [
                'title'             => $request->title,
                'event_category_id' => $request->event_category_id,
                'description'       => $request->description,
                'date'              => $request->date,
                'time'              => $request->time,
                'location'          => $request->location,
                'image'             => $imageUrl,
            ] );
            $notification = [
                'message'    => "event Updated With image Successfully",
                'alert-type' => 'success',
            ];
        } else {
            $event->update( [
                'title'             => $request->title,
                'event_category_id' => $request->event_category_id,
                'description'       => $request->description,
                'date'              => $request->date,
                'time'              => $request->time,
                'location'          => $request->location,
            ] );
            $notification = [
                'message'    => "event Updated Without image Successfully",
                'alert-type' => 'success',
            ];
        }

        return redirect()->route( 'all.event' )->with( $notification );
    }

    function deleteevent( Request $request ) {
        $event = Event::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first();
        if ( $event->image ) {
            unlink( str_replace( '\\', '/', public_path( 'upload/event/' . $event->image ) ) );
        }
        $event->delete();

        $notification = [
            'message'    => "event Deleted Successfully",
            'alert-type' => 'success',
        ];

        return redirect()->back()->with( $notification );
    }
}
