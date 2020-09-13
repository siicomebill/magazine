<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function mine(Request $request)
    {
        $articles = Article::user($request->user()->id)->with(['author', 'category'])->get();

        return Inertia::render('ArticlesManager', [
            'articles' => $articles
        ]);
    }

    public function newArticlePage(Request $request)
    {
        return Inertia::render('NewArticle', [
            "publishTo" => URL::route('articles.publish')
        ]);
    }

    public function store(ArticleRequest $request)
    {
        dd($request->all());
    }
}