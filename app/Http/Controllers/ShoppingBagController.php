<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ShoppingBagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bag = $request->session()->get('shopping_cart.articles', []);

        $articles = Article::whereIn('id', array_column($bag, 'id'));

        $bag = collect($bag)->map(function($item) use ($articles) {
            $article = $articles->where('id', $item['id'])->first();
            $article->quantity = $item['quantity'];
            return $article;
        });

        return view('shopping-bag.index')->with('bag', $bag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $bag = $request->session()->get('shopping_cart.articles', []);

        foreach ($bag as &$item) {
            if ($data['id'] === $item['id']) {

                if (!isset($data['type'])) {
                    $item['quantity'] += $data['quantity'];
                } else {
                    $item['quantity'] = $data['quantity'];
                }

                $data = null;
                break;
            }
        }

        if ($data) {
            $bag[] = ['id' => $data['id'], 'quantity' => $data['quantity']];
        }

        $request->session()->put('shopping_cart.articles', $bag);

        return Response::json(['status' => 'ok']);
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
        $request->request->add(['id' => $id, 'type' => 'update']);
        return $this->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bag = $request->session()->get('shopping_cart.articles', []);

        $key = array_search($id, array_column($bag, 'id'));
        unset($bag[$key]);

        $request->session()->put('shopping_cart.articles', $bag);
        return Response::json(['status' => 'ok']);
    }
}
