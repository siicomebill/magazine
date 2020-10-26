<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\ComponentRequest;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\ComponentRepository;
use Illuminate\Http\Request;

class ComponentController extends ResourceController implements ResourceControllerChildInterface
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

    public function store(ComponentRequest $request)
    {
        return $this->save($request);
    }
}
