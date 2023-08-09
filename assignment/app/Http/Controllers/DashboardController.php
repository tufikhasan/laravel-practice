<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function DashboardPage()
    {
        return view('pages.dashboard.dashboard-page');
    }
}
