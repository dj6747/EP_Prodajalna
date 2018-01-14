<?php
/**
 * Created by PhpStorm.
 * User: bine
 * Date: 27.12.17
 * Time: 15:42
 */

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
    }

    public function index()
    {
        if(Auth::user()->role === User::ROLE_CUSTOMER) {
            return view('articles')->with('articles', Article::where('active', 1)->get());
        }
        elseif (Auth::user()->role === User::ROLE_SELLER) {
            return view('sellers.articles-list')->with('articles', Article::all());
        }
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $data = Input::all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:20',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|URL',
            'active' => ['required', Rule::in([0,1])]
        ]);

        if ($validator->fails()) {
            return redirect()->route('articles.create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        Article::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $data['image'],
            'active' => $data['active'],
        ]);
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        return view('article.edit')
            ->with('article', Article::find($id));
    }

    public function update(Request $request, $id)
    {
        $data = Input::all();
        $validator = Validator::make($data, [
            'name' => 'required|string|max:20',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|URL',
            'active' => ['required', Rule::in([0,1])]
        ]);

        if ($validator->fails()) {
            return redirect()->route('articles.edit')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        $article = Article::find($id);
        $article->name = $data['name'];
        $article->price = $data['price'];
        $article->description = $data['description'];
        $article->image = $data['image'];
        $article->active = $data['active'];
        $article->save();

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        Article::destroy($id);
        return null;
    }



}