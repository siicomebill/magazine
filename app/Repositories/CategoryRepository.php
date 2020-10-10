<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends ResourceRepository
{
    protected $model = Category::class;

    public function find($id)
    {
        return $this->model::with('children')->findOrFail($id);
    }

    public function important()
    {
        return $this->latest(5)->doesntHave('parent')->with(['children']);
    }

    public function latest(int $limit = 10)
    {
        //TODO Check for latest articles
        return $this->model::limit($limit)->orderBy('id', 'desc')->has('articles')->with('articles');
    }

    public function get()
    {
        return $this->latest()->with(['parent', 'children'])->get();
    }
}