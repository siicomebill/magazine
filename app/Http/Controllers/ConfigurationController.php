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
        "newItemPage" => "EditConfiguration",
    ];

    public function __construct(ConfigurationRepository $configuration)
    {
        parent::__construct($configuration);
    }

    public function store(Request $request)
    {
        //TODO Custom request
        return parent::store($request);
    }
}
