<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\PageRequest;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\ComponentRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

class PageController extends ResourceController implements ResourceControllerChildInterface
{
    protected $routeNamePrefix = "pages";
    protected $pageComponents = [
        "managerPage" => "PageManager",
        "editItemPage" => "EditPage"
    ];

    protected $component;

    public function __construct(PageRepository $page, ComponentRepository $component)
    {
        parent::__construct($page);
        $this->component = $component;
    }
}
