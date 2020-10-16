<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ConfigurationRepository;
use App\Repositories\PageRepository;
use App\Repositories\SponsorRepository;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(SponsorRepository $sponsor, CategoryRepository $category, ArticleRepository $article, ConfigurationRepository $config)
    {
        return Inertia::render('Home', [
            "sponsors" => $sponsor->important()->get(),
            "categories" => $category->latest()->get(),
            "articles" => $article->others()->get(),
            "config" => $config->get(["banner" , "logo"]),
        ]);
    }

    public function about(PageRepository $page){
        $content = $page->get(['about']);

        if($content)
            return Inertia::render('About', [
                "content" => $content
            ]);
        else
            return abort(404);
    }
}
