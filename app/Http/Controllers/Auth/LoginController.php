<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        if (!Auth::user()->active) {
            Auth::logout();
            return redirect()->back()->withErrors(['Account inactive']);
        }

        if (Auth::user()->role === User::ROLE_CUSTOMER) {
            return redirect('/home');
        }

        if (!array_key_exists('SSL_CLIENT_S_DN_Email', $_SERVER)) {
            Auth::logout();
            return redirect()->back()->withErrors(['Please select your certificate.']);
        }

        $email = $_SERVER['SSL_CLIENT_S_DN_Email'];

        if (!$email && preg_match('#/emailAddress=(.+\@.+\..+)(/|$)#', $_SERVER['SSL_CLIENT_S_DN'], $matches)) {
            $email = $matches[1];
        }

        if (Auth::user()->email != $email) {
            Auth::logout();
            return redirect()->back()->withErrors(['Please select your certificate.']);
        }


        return redirect('/home');
    }
}
