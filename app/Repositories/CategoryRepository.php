<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends ResourceRepository
{
    protected $model = Category::class;

    public function important()
    {
        return $this->model::limit(10)->has('articles')->doesntHave('parent')->with(['articles', 'children']);
    }

    public function latest(int $limit = 0)
    {
        //TODO Include limit
        return $this->model::orderBy('id', 'desc');
    }

    public function get()
    {
        return $this->latest()->with(['parent', 'children'])->get();
    }
}