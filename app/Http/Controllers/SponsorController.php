<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SponsorController extends Controller
{
    public function index()
    {
        //TODO Add links like in ArticleController
        return Inertia::render('SponsorsManager', [
            "sponsors" => Sponsor::all()
        ]);
    }
}
