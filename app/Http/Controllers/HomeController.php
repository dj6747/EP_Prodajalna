<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = Auth::user()->role;

        if ($user_role === User::ROLE_ADMIN) {
            return redirect()->route('sellers.index');
        } else if ($user_role === User::ROLE_SELLER) {
            return redirect()->route('customers.index');
        }

        return view('home');
    }
}
