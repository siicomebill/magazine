<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends ResourceRepository
{
    protected $model = Category::class;

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function important()
    {
        return $this->model::orderBy('depth', 'desc')->doesntHave('parent')->with('children');
    }

    public function latest(int $limit = 10)
    {
        //TODO Check for latest articles
        return $this->model
            ::orderBy('lft', 'asc')
            ->has('articles')
            ->with(['articles' => function($query){
                $query->select(['title', 'id', 'category_id', 'user_id', 'image']);
            }])
            ->with('parent');
    }

    public function get()
    {
        return $this->latest()->with(['parent', 'children'])->get();
    }

    public function paginated($perPage = 5)
    {
        return $this->asModel()->paginate($perPage);
    }
}
