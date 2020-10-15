<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CategoryController extends ResourceController
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

    /**
     * Create or update an element of the specified resource.
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }

    public function getMinimal()
    {
        $categories = $this->resource->asModel()->all(["name", "id"]);

        return $this->renderer::render('Categories', [
            "categories" => $categories
        ]);
    }

    public function articlesOfCategory($id)
    {
        $category = $this->resource->find($id);
        $articles = $category->articles()->get();

        return $this->renderer::render('ArticleList', [
            "category" => $category,
            "articles" => $articles
        ]);
    }

    public function editItemPage(Request $request, $id = null, array $additionalData = [])
    {
        $model = $this->resource->asModel();
        $item = $model->find($id ?? $request[$model->getKeyName()] ?? null);

        $categoriesQuery = $this->resource->asModel();

        if($item)
            $categoriesQuery = $categoriesQuery->where('id', '!=', $item->id);

        $edited = [
            "stored" => $item ?? null,
            "publishTo" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["publish"]),
            "categories" => $categoriesQuery->get(["name", "id"])
        ];

        return $this->renderer::render($this->pageComponents["editItemPage"], array_merge($edited, $additionalData));
    }
}
