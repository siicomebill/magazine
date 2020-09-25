<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

//TODO Use dependency injection for Requests (?)
//TODO Use depencency injection for renderer (?)
//TODO Use generic ResourceRequest(s)
abstract class ResourceController extends Controller
{
    /**
     * The model class to interact with.
     * 
     * @var mixed
     */
    protected $model;

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
        "managerPage" => "",
        "newItemPage" => "",
    ];

    /**
     * Display the resource-manager page with all the necessary resources.
     * 
     * @param Request $request
     */
    public function managerPage(Request $request)
    {
        $items = $this->model::all();

        $items->each(function ($value, $key) {
            $value["links"] = [
                "edit" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["edit"], $value->id),
                "delete" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["delete"], $value->id),
            ];
        });

        return $this->renderer::render($this->pageComponents["managerPage"], [
            "items" => $items
        ]);
    }
    
    /**
     * Display the page used for inserting or editing an existing instance of the specified resource.
     * 
     * @param Request $request
     */
    public function newItemPage(Request $request)
    {
        $item = $this->model::find($request->id);

        return $this->renderer::render($this->pageComponents["newItemPage"], [
            "stored" => $item ?? null,
            "publishTo" => URL::route($this->routeNamePrefix . '.' . $this->actionRoutes["publish"]),
        ]);
    }
}
