<?php

namespace App\Http\Controllers\Base;

use App\Helpers\PaginatedCollection;
use App\Http\Controllers\Controller;
use App\Interfaces\Controllers\ResourceControllerInterface;
use App\Repositories\ResourceRepository;
use App\Traits\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

abstract class ResourceController extends Controller implements ResourceControllerInterface
{
    use Renderable;

    /**
     * The prefix for the routes that the given resource uses.
     * 
     * @var string
     */
    protected $routeNamePrefix;

    /**
     * Route names to all the actions possible with the given resource.
     * These names will be used as suffixes for $routeNamePrefix
     * 
     * @var string[]
     */
    protected $actionRoutes = [
        "list" => "list",
        "edit" => "write",
        "delete" => "delete",
        "publish" => "publish",
    ];

    /**
     * List of every component name used to manage the given resource.
     * 
     * @var string[]
     */
    protected $pageComponents = [
        "listPage" => "",
        "managerPage" => "",
        "editItemPage" => "",
    ];

    public function __construct(ResourceRepository $resource)
    {
        $this->resource = $resource;
    }
}
