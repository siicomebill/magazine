<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Support\Facades\URL;

class ArticleRepository extends ReactableResourceRepository implements ArticleRepositoryInterface
{
    protected $model = Article::class;

    public function store($data, $user = null)
    {
        $user = $user ?? auth()->user();

        if (array_key_exists('id', $data)) {
            $article = $user->articles()->find($data['id']);

            if ($article) {
                $article->update($data);
                return true;
            } else {
                //TODO Populate error bag
                return false;
            }
        } else {
            $user->articles()->create($data);
            return true;
        }
    }

    public function others()
    {
        return $this->latest(20)->doesnthave('category');
    }

    public function latest(int $limit = 0){
        return $this->asModel()->public()->latest('published_at')->limit($limit)->with(['category' => function ($query) {
            $query->with('parent'); //TODO Move category parent query by default in model
        }]);
    }

    //TODO Move in ResourceRepository - but generalize it there
    public function forManagerPage($userId = null, $actionRoutes = null)
    {
        $articles = $this->asModel()->latest('updated_at')->user($userId ?? auth()->user()->id)->paginate(5);

        //TODO Write resource routes class for storing these values
        $defaultRoutes = [
            "edit" => "articles.write",
            "delete" => "articles.delete",
        ];
        $navigation["routes"] = $actionRoutes ? array_merge($defaultRoutes, $actionRoutes) : $defaultRoutes;

        $navigation["userId"] = $userId;

        $articles->each(function ($value, $key) use ($navigation) {
            //TODO Write resource route generator helper in resource routes class
            $value["links"] = [
                "edit" => URL::route($navigation["routes"]["edit"], ["userId" => $navigation["userId"],"id" => $value->id]),
                "delete" => URL::route($navigation["routes"]["delete"], ["userId" => $navigation["userId"],"id" => $value->id]),
            ];
        });

        return $articles;
    }

    public function forEditor($id = null, $userId = null)
    {
        $article = $this->model::user($userId)->find($id);

        return $article;
    }

    public function find($id)
    {
        if ($article = parent::asModel()->where('slug', $id)->first())
            return $article;
        else
            return parent::find($id);
    }
}
