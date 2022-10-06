<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show user home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.home.index');
    }
}
