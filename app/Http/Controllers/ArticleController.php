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

        $articles->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route('articles.write', $value->id)
            ];
        });

        return Inertia::render('ArticlesManager', [
            //TODO Insert links to edit, remove, publish, etc.
            'articles' => $articles
        ]);
    }

    public function newArticlePage(Request $request)
    {
        $article = Article::find($request->id);

        return Inertia::render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish')
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $user = auth()->user();

        if ($request->id) {
            $article = $user->articles()->find($request->id);

            if ($article) {
                $article->update($request->all());
                return redirect()->route('articles.list.mine');
            } else {
                //TODO Populate error bag
                return redirect()->back('500');
            }
        } else {
            $user->articles()->create($request->all());
            return redirect()->route('articles.list.mine');
        }
    }
}
