<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\User;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sellers.index')
            ->with('sellers', Seller::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellers.create')->with('zip_codes', ZipCode::all());
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
            return redirect()->route('sellers.create')
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
            $user->role = User::ROLE_SELLER;
            $user->save();
        }

        return redirect()->route('sellers.index');
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
        return view('sellers.edit')
            ->with('seller', Seller::find($id))
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
        $zip_code_ids = ZipCode::all()->pluck('id')->toArray();
        $user = User::find($id);

        $rules = [
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required',
            'address' => 'required|string',
            'zip_code_id' => ['required', Rule::in($zip_code_ids)],
            'active' => ['required', Rule::in([0,1])]
        ];

        if ($data['password']) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        $validator = Validator::make($data, $rules);


        if ($validator->fails()) {
            return redirect()->route('sellers.edit', $id)
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
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

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Seller::destroy($id);
        return null;
    }
}
