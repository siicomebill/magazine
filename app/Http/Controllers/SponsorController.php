<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class SponsorController extends ResourceController
{
    protected $model = Sponsor::class;
    protected $routeNamePrefix = "sponsors";
    protected $pageComponents = [
        "managerPage" => "SponsorsManager",
        "newItemPage" => "NewSponsor"
    ];
}
