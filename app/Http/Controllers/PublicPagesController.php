<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Sponsor;
use App\Repositories\ArticleRepository;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(ArticleRepository $article, SponsorRepository $sponsor)
    {
        return Inertia::render('Home', [
            "articles" => $article->get(),
            "sponsors" => $sponsor->get(),
        ]);
    }
}
