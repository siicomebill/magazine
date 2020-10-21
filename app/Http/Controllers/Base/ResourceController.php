<?php

namespace App\Http\Controllers\Base;

use App\Helpers\PaginatedCollection;
use App\Http\Controllers\Controller;
use App\Repositories\ResourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

abstract class ResourceController extends Controller
{
    /**
     * The prefix for the routes that the given resource uses.
     * 
     * @var string
     */
    protected $routeNamePrefix;

    /**
     * The page renderer class.
     * 
     * @var mixed
     */
    protected $renderer = Inertia::class;

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

    /**
     * Display the resource-manager page with all the necessary resources.
     * 
     * @param Request $request
     */
    public function managerPage(Request $request)
    {
        $items = $this->resource->paginated();

        $items->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["edit"], $value->id),
                "delete" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["delete"], $value->id),
            ];
        });

        $paginatedResource = new PaginatedCollection($items);

        return $this->renderer::render($this->pageComponents["managerPage"], [
            "items" => $paginatedResource
        ]);
    }
    
    /**
     * Display the page used for inserting or editing an existing instance of the specified resource.
     * 
     * @param Request $request
     */
    public function editItemPage(Request $request, $id = null, array $additionalData = [])
    {
        $model = $this->resource->asModel();
        $item = $model->find($id ?? $request[$model->getKeyName()] ?? null);

        $edited = [
            "stored" => $item ?? null,
            "publishTo" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["publish"]),
        ];

        return $this->renderer::render($this->pageComponents["editItemPage"], array_merge($edited, $additionalData));
    }

    /**
     * Internal method used to actually save the data given by the request.
     * The request given should be validated in the `store` method.
     */
    protected function save($request){
        return $this->resource->store($request) ? redirect()->route($this->routeNamePrefix . '.' . $this->actionRoutes["list"]) : redirect()->back(500);
    }

    /**
     * Delete an instance of the specified resource
     * 
     * @param $id
     */
    public function delete($id)
    {
        $this->resource->delete($id);

        return redirect()->route($this->routeNamePrefix . '.' . $this->actionRoutes["list"]);
    }
}
