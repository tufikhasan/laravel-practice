<?php

namespace App\Http\Controllers;
use App\Models\leave_category;
use App\Models\Leave_request;

class DashboardController extends Controller {
    function dashboardMethod() {
        $leave_category = leave_category::count();
        $leave_request = Leave_request::count();
        return view( 'admin.index', compact( 'leave_category', 'leave_request' ) );
    }
}
