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

    public function forManagerPage($request, $userId = null)
    {
        $articles = $this->model::user($userId ?? $request->user()->id)->get();

        $articles->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route('articles.write', $value->id),
                "delete" => URL::route('articles.delete', $value->id),
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