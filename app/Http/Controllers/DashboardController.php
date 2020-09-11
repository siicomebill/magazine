<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Dashboard');
    }

    public function listArticles(Request $request)
    {
        $articles = Article::user($request->user()->id)->with(['author', 'category'])->get();

        return Inertia::render('ArticlesManager', [
            'articles' => $articles
        ]);
    }
}
