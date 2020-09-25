<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\SponsorRepository;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(SponsorRepository $sponsor, CategoryRepository $category)
    {
        return Inertia::render('Home', [
            "sponsors" => $sponsor->get(),
            "categories" => $category->important()->get()
        ]);
    }
}
