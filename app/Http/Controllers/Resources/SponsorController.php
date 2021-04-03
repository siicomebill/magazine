<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\SponsorRequest;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;

class SponsorController extends ResourceController implements ResourceControllerChildInterface
{
    protected $routeNamePrefix = "sponsors";
    protected $pageComponents = [
        "managerPage" => "SponsorsManager",
        "editItemPage" => "NewSponsor"
    ];

    public function __construct(SponsorRepository $sponsor)
    {
        parent::__construct($sponsor);
    }
}
