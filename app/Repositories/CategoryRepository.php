<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends ResourceRepository
{
    protected $model = Category::class;

    public function important()
    {
        return $this->model::limit(10);
    }

    public function get()
    {
        $this->asModel()->with('articles')->get();
    }
}