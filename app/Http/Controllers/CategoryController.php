<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\CategoryRepository;

class CategoryController extends ResourceController
{
    protected $routeNamePrefix = "categories";
    protected $pageComponents =  [
        "managerPage" => "CategoriesManager",
        "newItemPage" => "NewCategory",
    ];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function getMinimal()
    {
        $categories = $this->category->asModel()->all(["name", "id"]);

        return $this->renderer::render('Categories', [
            "categories" => $categories
        ]);
    }

    public function articlesOfCategory($id)
    {
        $category = $this->find($id);
        $articles = $category->articles()->get();

        return $this->renderer::render('ArticleList', [
            "category" => $category,
            "articles" => $articles
        ]);
    }
}
