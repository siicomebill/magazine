<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

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
        $categories = Category::all(["name", "id"]);

        return Inertia::render('Categories', [
            "categories" => $categories
        ]);
    }

    public function articlesOfCategory($id)
    {
        $category = Category::findOrFail($id);
        $articles = $category->articles()->get();

        return Inertia::render('ArticleList', [
            "category" => $category,
            "articles" => $articles
        ]);
    }
}
