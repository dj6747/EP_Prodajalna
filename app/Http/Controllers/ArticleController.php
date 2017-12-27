<?php
/**
 * Created by PhpStorm.
 * User: bine
 * Date: 27.12.17
 * Time: 15:42
 */

namespace App\Http\Controllers;


use App\Models\Article;

class ArticleController extends Controller
{
    public function __construct() {

    }


    public function index()
    {
        return view('articles')->with('articles', Article::all());

    }




}