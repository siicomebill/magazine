<?php

namespace App\Http\Controllers;

use App\Helpers\SEO;
use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\CategoryRequest;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryController extends ResourceController implements ResourceControllerChildInterface
{
    protected $routeNamePrefix = "categories";
    protected $pageComponents =  [
        "managerPage" => "CategoriesManager",
        "editItemPage" => "NewCategory",
    ];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function articlesOfCategory($id)
    {
        $category = $this->resource->find($id);
        $articles = $category->articles()->public()->get();

        SEO::set($category);

        return $this->render('ArticleList', [
            "category" => $category,
            "articles" => $articles,
            "children" => $category->children()->with(['articles' => function ($query) {
                $query->latest()->public()->limit(4);
            }])->get(),
        ]);
    }
}
