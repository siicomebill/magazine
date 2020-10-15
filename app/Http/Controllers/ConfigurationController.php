<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\ConfigurationRequest;
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
     * @param ConfigurationRequest $request
     */
    public function store(ConfigurationRequest $request)
    {
        return $this->save($request);
    }
}
