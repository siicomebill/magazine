<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $article, SponsorRepository $sponsor)
    {
        $this->article = $article;
        $this->sponsor = $sponsor;
    }
    
    public function managerPage(Request $request)
    {
        $articles = $this->article->asModel()->user($request->user()->id)->get();

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

    public function editItemPage(Request $request)
    {
        $article = $this->article->asModel()::find($request->id);
        $categories = Category::all(["name", "id"]);

        return Inertia::render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $categories
        ]);
    }

    public function store(ArticleRequest $request)
    {
        return $this->article->store($request, auth()->user()) ? redirect()->route('articles.list.mine') : redirect()->back('500');
    }

    public function read($id)
    {
        return Inertia::render('Article', [
            "article" => $this->article->find($id),
            "sponsor" => $this->sponsor->random()->first(),
        ]);
    }   

    public function delete($id)
    {
        $this->article->delete($id);

        return redirect()->back();
    }
}
