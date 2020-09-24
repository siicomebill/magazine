<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicPagesController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Home', [
            "articles" => Article::all(),
            "sponsors" => Sponsor::all(),
        ]);
    }
}
