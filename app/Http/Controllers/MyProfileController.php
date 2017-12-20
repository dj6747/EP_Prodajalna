<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user profile
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('my-profile');
    }
}
