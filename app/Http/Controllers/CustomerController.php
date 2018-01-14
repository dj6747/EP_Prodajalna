<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index')
            ->with('customers', Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create')->with('zip_codes', ZipCode::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::all();
        $zip_code_ids = ZipCode::all()->pluck('id')->toArray();
        $rules = [
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => ['required', 'email', Rule::unique('users')],
            'phone' => 'required',
            'address' => 'required|string',
            'zip_code_id' => ['required', Rule::in($zip_code_ids)]
        ];

        if ($data['password']) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $validator = Validator::make($data, $rules);


        if ($validator->fails()) {
            return redirect()->route('customers.create')
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {
            $user = new User();
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->zip_code_id = $data['zip_code_id'];
            $user->email = $data['email'];

            if ($data['password']) {
                $user->password = Hash::make($data['password']);
            }

            $user->active = $data['active'];
            $user->role = User::ROLE_CUSTOMER;
            $user->save();
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customers.edit')
            ->with('customer', Customer::find($id))
            ->with('zip_codes', ZipCode::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Input::all();
        $user = User::find($id);
        $zip_code_ids = ZipCode::all()->pluck('id')->toArray();
        $rules = [
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'phone' => 'required',
            'address' => 'required|string',
            'zip_code_id' => ['required', Rule::in($zip_code_ids)]
        ];

        if ($data['password']) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $validator = Validator::make($data, $rules);


        if ($validator->fails()) {
            return redirect()->route('customers.edit', $id)
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation', 'oldpassword'));
        } else {
            $user->firstname = $data['firstname'];
            $user->lastname = $data['lastname'];
            $user->phone = $data['phone'];
            $user->address = $data['address'];
            $user->zip_code_id = $data['zip_code_id'];
            $user->email = $data['email'];

            if ($data['password']) {
                $user->password = Hash::make($data['password']);
            }

            $user->active = (int) $data['active'];
            $user->save();
        }

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return null;
    }
}
