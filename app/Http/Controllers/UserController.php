<?php

namespace App\Http\Controllers;

use App\Helpers\PaginatedCollection;
use App\Http\Controllers\Base\ResourceController;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

class UserController extends ResourceController implements ResourceControllerChildInterface
{
    protected $routeNamePrefix = "user";
    protected $pageComponents = [
        "managerPage" => "UserManager",
        "editItemPage" => "EditUser",
    ];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
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

    //FIXME Repeated logic, find a way to abstract it
    public function managerPage(Request $request){
        if($request->role)
            $items = $this->resource->asModel()->role($request->role)->paginate(5);
        else
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
}
