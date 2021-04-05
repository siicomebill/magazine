<?php

namespace App\Http\Controllers\Resources;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Dashboard');
    }
}
