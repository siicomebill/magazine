<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\ComponentRepository;
use Illuminate\Http\Request;

class ComponentController extends ResourceController
{
    protected $routeNamePrefix = "component";
    protected $pageComponents = [
        "listPage" => "",
        "managerPage" => "ComponentManager",
        "editItemPage" => "EditComponent",
    ];

    public function __construct(ComponentRepository $component)
    {
        parent::__construct($component);
    }

    public function store(Request $request)
    {
        return $this->save($request);
    }
}
