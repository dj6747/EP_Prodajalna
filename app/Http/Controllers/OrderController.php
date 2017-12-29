<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.waiting')->with('orders', Order::waiting()->orderBy('created_at', 'desc')->get());
    }

    public function waitingList()
    {
        return $this->index();
    }

    public function confirmedList()
    {
        return view('orders.confirmed')->with('orders', Order::confirmed()->orderBy('created_at', 'desc')->get());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bag = $request->session()->get('shopping_cart.articles', []);

        $articles = Article::whereIn('id', array_column($bag, 'id'));

        $bag = collect($bag)->map(function($item) use ($articles) {
            $article = $articles->where('id', $item['id'])->first();
            $article->quantity = $item['quantity'];
            return $article;
        });

        return view('orders.create')->with('shopping_bag', $bag)->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO: store to orders table, articles are in session
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
