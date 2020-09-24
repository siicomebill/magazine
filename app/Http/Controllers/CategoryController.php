<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class CategoryController extends Controller
{
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

    public function index()
    {
        $categories = Category::all();

        $categories->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route('categories.write', $value->id),
                "delete" => URL::route('categories.delete', $value->id),
            ];
        });

        return Inertia::render('CategoriesManager', [
            "categories" => $categories
        ]);
    }

    public function newCategoryPage(Request $request)
    {
        $category = Category::find($request->id);

        return Inertia::render('NewCategory', [
            "stored" => $category ?? null,
            "publishTo" => URL::route('categories.publish'),
        ]);
    }

    public function store(Request $request)
    {
        if ($request->id) {
            $category = Category::find($request->id);

            if ($category) {
                $category->update($request->all());
                return redirect()->route('categories.list');
            } else {
                //TODO Populate error bag
                return redirect()->back('500');
            }
        } else {
            Category::create($request->all());
            return redirect()->route('categories.list');
        }
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('categories.list');
    }
}
