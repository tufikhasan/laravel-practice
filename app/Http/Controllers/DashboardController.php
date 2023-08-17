<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    function dashboardMethod() {
        $totalCategory = EventCategory::where( 'user_id', Auth::id() )->count();
        $eventCount = Event::where( 'user_id', Auth::id() )->count();
        return view( 'admin.index', compact( 'totalCategory', 'eventCount' ) );
    }
}
