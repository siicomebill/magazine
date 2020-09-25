<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\SponsorRepository;

class SponsorController extends ResourceController
{
    protected $routeNamePrefix = "sponsors";
    protected $pageComponents = [
        "managerPage" => "SponsorsManager",
        "newItemPage" => "NewSponsor"
    ];

    public function __construct(SponsorRepository $sponsor)
    {
        parent::__construct($sponsor);
    }
}
