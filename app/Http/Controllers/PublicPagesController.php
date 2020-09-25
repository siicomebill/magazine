<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Sponsor;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(ArticleRepository $article, SponsorRepository $sponsor, CategoryRepository $category)
    {
        return Inertia::render('Home', [
            "sponsors" => $sponsor->get(),
            "categories" => $category->important()->get()
        ]);
    }
}
