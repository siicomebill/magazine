<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ConfigurationRepository;
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
            "config" => $config->get(["banner"]),
        ]);
    }
}
