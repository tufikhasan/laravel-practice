<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventCategoryController extends Controller {
    function allEventCategory() {
        $eventCategories = EventCategory::where( 'user_id', Auth::id() )->latest()->get();
        return view( 'admin.eventCategory.all_events_category', compact( 'eventCategories' ) );
    }
    function addEventCategory() {
        return view( 'admin.eventCategory.add_event_category' );
    }
    function storeEventCategory( Request $request ) {
        EventCategory::insert( ['user_id' => Auth::id(), 'name' => $request->name] );

        $notification = [
            'message'    => "Event Category Added Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }

    function editEventCategory( Request $request ) {
        $category = EventCategory::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first();
        return view( 'admin.eventCategory.edit_event_category', compact( 'category' ) );
    }
    function updateEventCategory( Request $request ) {
        $category = EventCategory::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first();

        $category->update( ['name' => $request->name] );

        $notification = [
            'message'    => "Event Category Updated Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }
    function deleteEventCategory( Request $request ) {
        EventCategory::where( ['user_id' => Auth::id(), 'id' => $request->id] )->first()->delete();

        $notification = [
            'message'    => "Event Category Deleted Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }
}
