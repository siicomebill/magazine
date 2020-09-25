<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function managerPage(Request $request)
    {
        $articles = Article::user($request->user()->id)->get();

        $articles->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route('articles.write', $value->id),
                "delete" => URL::route('articles.delete', $value->id),
            ];
        });

        return Inertia::render('ArticlesManager', [
            'items' => $articles
        ]);
    }

    public function newItemPage(Request $request)
    {
        $article = Article::find($request->id);
        $categories = Category::all(["name", "id"]);

        return Inertia::render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $categories
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

    public function read($id)
    {
        return Inertia::render('Article', [
            "article" => Article::findOrFail($id)
        ]);
    }   

    public function delete($id)
    {
        Article::findOrFail($id)->delete();

        return redirect()->back();
    }
}
