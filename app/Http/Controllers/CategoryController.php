<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
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
