<?php

namespace App\Http\Controllers;

use App\Helpers\SEO;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ConfigurationRepository;
use App\Repositories\PageRepository;
use App\Repositories\SponsorRepository;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(SponsorRepository $sponsor, CategoryRepository $category, ArticleRepository $article, ConfigurationRepository $config)
    {
        return Inertia::render('Home', [
            "sponsors" => $sponsor->important()->get(),
            "categories" => $category->latest()->get()->sortBy('articles.updated_at'),
            "articles" => $article->others()->get(),
            "config" => $config->get(["banner" , "logo"]),
        ]);
    }

    public function page(string $slug, PageRepository $page){
        $model = $page->get($slug);

        $data = $model->toArray();

        $content = Arr::except($data, 'slug');

        SEO::set($model);

        if($content)
            return Inertia::render('PageContainer', [
                "content" => $content
            ]);
        else
            return abort(404);
    }
}
