<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view_name = 'waiting';
        $orders = Order::waiting();
        if (Auth::user()->role === User::ROLE_CUSTOMER) {
            $view_name = 'waiting-customer';
            $orders->where('customer_id', Auth::user()->id);
        }

        return view('orders.'.$view_name)->with('orders', $orders->orderBy('created_at', 'desc')->get());
    }

    public function waitingList()
    {
        return $this->index();
    }

    public function confirmedList()
    {
        $view_name = 'confirmed';
        $orders = Order::confirmed();
        if (Auth::user()->role === User::ROLE_CUSTOMER) {
            $view_name = 'confirmed-customer';
            $orders->where('customer_id', Auth::user()->id);
        }

        return view('orders.'.$view_name)->with('orders', $orders->orderBy('created_at', 'desc')->get());
    }


    public function cancelledList()
    {
        $view_name = 'cancelled-customer';
        $orders = Order::permanentlyCancelled()->where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('orders.'.$view_name)->with('orders', $orders);
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
            $articles = clone $articles;
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
        $bag = $request->session()->get('shopping_cart.articles', []);

        $bag = collect($bag)->map(function($item) {
            $article = [
                'article_id' => $item['id'],
                'quantity' => $item['quantity']
            ];
            return $article;
        });

        $order = new Order();
        $order->customer_id = Auth::user()->id;
        $order->save();
        $order->articles()->attach($bag);
        $request->session()->forget('shopping_cart.articles');
        return response()->json(['status' => 'ok']);
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
        $data = Input::all();
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['status' => 'error']);
        }

        $order->review_status = in_array($data['review_status'] , Order::STATUSES) ? $data['review_status'] : 0;
        $order->reviewed_by = Auth::user()->id;
        $order->save();
        return response()->json(['status' => 'ok']);
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
