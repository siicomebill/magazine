<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Support\Facades\URL;

class ArticleRepository extends ResourceRepository implements ArticleRepositoryInterface
{
    protected $model = Article::class;

    public function store($request, $user = null)
    {
        $user = $user ?? auth()->user();

        if ($request->id) {
            $article = $user->articles()->find($request->id);

            if ($article) {
                $article->update($request->all());
                return true;
            } else {
                //TODO Populate error bag
                return false;
            }
        } else {
            $user->articles()->create($request->all());
            return true;
        }
    }

    public function others()
    {
        return $this->latest(20)->doesnthave('category');
    }

    //TODO Move in ResourceRepository
    public function forManagerPage($request, $userId = null, $actionRoutes = null)
    {
        $articles = $this->model::user($userId ?? $request->user()->id)->get();

        //TODO Write resource routes class for storing these values
        $routes = $actionRoutes ?? [
            "edit" => "articles.write",
            "delete" => "articles.delete",
        ];

        $articles->each(function ($value, $key) use ($routes) {
            //TODO Write resource route generator helper in resource routes class
            $value["links"] = [
                "edit" => URL::route($routes["edit"], $value->id),
                "delete" => URL::route($routes["delete"], $value->id),
            ];
        });

        return $articles;
    }

    public function forEditor($id = null, $userId = null)
    {
        $article = $this->model::user($userId)->find($id);

        return $article;
    }
}
