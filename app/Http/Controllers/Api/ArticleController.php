<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController
{
    public function getAll(Request $request)
    {
        return response()->json(Article::where('active', 1)->orderBy('name')->get());
    }

    public function getById(Request $request, $id)
    {
        return response()->json(Article::find($id));
    }
}