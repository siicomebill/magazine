<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\ConfigurationRepository;
use Illuminate\Http\Request;

class ConfigurationController extends ResourceController
{
    protected $routeNamePrefix = "config";
    protected $pageComponents = [
        "listPage" => "",
        "managerPage" => "ConfigurationManager",
        "editItemPage" => "EditConfiguration",
    ];

    public function __construct(ConfigurationRepository $configuration)
    {
        parent::__construct($configuration);
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
