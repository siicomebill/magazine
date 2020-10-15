<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SponsorRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ArticleController extends ResourceController
{
    public function __construct(ArticleRepository $article, SponsorRepository $sponsor, CategoryRepository $category, UserRepository $user)
    {
        $this->article = $article;
        $this->sponsor = $sponsor;
        $this->category = $category;
        $this->user = $user;
    }

    public function managerPage(Request $request, $userId = null)
    {
        $routes = $userId ? [
            "edit" => "articles.ofUser.write",
            "delete" => "articles.ofUser.delete"
        ] : [];

        return Inertia::render('ArticlesManager', [
            'items' => $this->article->forManagerPage($userId, $routes)
        ]);
    }

    public function editItemPage(Request $request, $id = null, $additionalData = [])
    {
        $article = $this->article->forEditor($id, auth()->user()->id);

        return Inertia::render('NewArticle', [
            "stored" => $article ?? null,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $this->category->list(["name", "id"])
        ]);
    }

    public function editOtherItemPage(Request $request, $userId = null, $id = null)
    {
        $article = $this->article->forEditor($id, $userId);

        if (!$article)
            return redirect()->route('articles.write');

        return Inertia::render('NewArticle', [
            "stored" => $article,
            "publishTo" => URL::route('articles.publish'),
            "categories" => $this->category->list(["name", "id"])
        ]);
    }

    public function store(ArticleRequest $request)
    {
        $user = $request->user_id ? $this->user->find($request->user_id) : null;

        //FIXME Do not redirect, return response instead
        return $this->article->store($request, $user) ? redirect()->route('articles.mine.list') : redirect()->back(500);
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
