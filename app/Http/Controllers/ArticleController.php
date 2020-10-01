<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function __construct(ArticleRepository $article, SponsorRepository $sponsor, CategoryRepository $category)
    {
        $this->article = $article;
        $this->sponsor = $sponsor;
        $this->category = $category;
    }
    
    public function managerPage(Request $request, $userId = null)
    {
        return Inertia::render('ArticlesManager', [
            'items' => $this->article->forManagerPage($request, $userId)
        ]);
    }

    public function editItemPage(Request $request, $userId = null, $id = null)
    {
        $article = $this->article->forEditor($id, $userId);

        return Inertia::render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $this->category->list(["name", "id"])
        ]);
    }

    public function store(ArticleRequest $request)
    {
        return $this->article->store($request) ? redirect()->route('articles.mine.list') : redirect()->back(500);
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
