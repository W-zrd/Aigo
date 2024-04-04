<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardClient()
    {
        return view('dashboardClient');
    }

    public function consultation()
    {
        return view('consultation');
    }

    public function result()
    {
        return view('result');
    }
}
