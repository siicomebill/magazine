<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\ConfigurationRequest;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\ConfigurationRepository;
use Illuminate\Http\Request;

class ConfigurationController extends ResourceController implements ResourceControllerChildInterface
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
}
