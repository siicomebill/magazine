<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ArticleRepositoryInterface;
use App\Models\Article;

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
}