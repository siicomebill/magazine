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
        $articles = Category::findOrFail($id)->articles;

        return Inertia::render('ArticleList', [
            "articles" => $articles
        ]);
    }
}
