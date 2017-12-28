<?php

namespace App\Http\Controllers;

use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
        return view('my-profile')
            ->with('user', Auth::user())
            ->with('zip_codes', ZipCode::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Input::all();
        $zip_code_ids = ZipCode::all()->pluck('id')->toArray();
        $rules = [
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'phone' => 'required',
            'address' => 'required|string',
            'zip_code_id' => ['required', Rule::in($zip_code_ids)]
        ];

        if ($data['oldpassword']) {
            $rules['oldpassword'] = 'required_with:password|password_check:'.Auth::user()->password;
            $rules['password'] = 'required|min:6|confirmed|different:oldpassword';
        }

        $validator = Validator::make($data, $rules);


        if ($validator->fails()) {
            return redirect()->route('my-profile.index')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation', 'oldpassword'));
        } else {
            $user = Auth::user();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->zip_code_id = $data['zip_code_id'];
            $user->email = $data['email'];

            if ($data['password']) {
                $user->password = Hash::make($data['password']);
            }

            $user->save();
        }

        return redirect()->route('home');
    }

}
