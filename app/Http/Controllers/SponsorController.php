<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\SponsorRequest;
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
     * @param SponsorRequest $request
     */
    public function store(SponsorRequest $request)
    {
        return $this->save($request);
    }
}
