<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;

class SitemapController extends Controller
{
    public function main(ArticleRepository $articles, CategoryRepository $categories, UserRepository $users)
    {
        $sitemap = Sitemap::create()
            ->add(route('home'))
            ->add(route('categories'));

        $articleList = $articles->latest(50)->get();
        $categoryList = $categories->list();
        $authorsList = $users->asModel()->has('articles')->get();

        foreach ($articleList as $article){
            $link = $article->slug ? route('articles.read', $article->slug) : route('articles.read', $article->id);

            $sitemap->add($link);
        }

        foreach ($categoryList as $category){
            $sitemap->add(route('categories.articles', $category->id));
        }

        foreach ($authorsList as $author){
            $sitemap->add(route('user.page', $author->id));
        }

        return $sitemap->toResponse(request());
    }
}
