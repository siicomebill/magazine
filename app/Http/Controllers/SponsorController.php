<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;

class SponsorController extends ResourceController
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

    /**
     * Create or update an element of the specified resource.
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }
}
