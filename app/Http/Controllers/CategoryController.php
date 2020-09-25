<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Models\Category;

class CategoryController extends ResourceController
{
    protected $model = Category::class;
    protected $routeNamePrefix = "categories";
    protected $pageComponents =  [
        "managerPage" => "CategoriesManager",
        "newItemPage" => "NewCategory",
    ];

    public function getMinimal()
    {
        $categories = $this->model::all(["name", "id"]);

        return $this->renderer::render('Categories', [
            "categories" => $categories
        ]);
    }

    public function articlesOfCategory($id)
    {
        $category = $this->model::findOrFail($id);
        $articles = $category->articles()->get();

        return $this->renderer::render('ArticleList', [
            "category" => $category,
            "articles" => $articles
        ]);
    }
}
