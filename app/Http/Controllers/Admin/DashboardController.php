<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
