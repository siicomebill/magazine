<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRolesController extends ResourceController
{
    protected $routeNamePrefix = "user.roles";
    protected $pageComponents = [
        "managerPage" => "UserManager",
        "editItemPage" => "EditUserRoles",
    ];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function editItemPage(Request $request, $id = null, array $additionalData = [])
    {
        return parent::editItemPage($request, $id, [
            "roles" => Role::all(['name', 'id'])
        ]);
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

    public function save($request)
    {
        return $this->resource->store($request) ? redirect()->route('user.' . $this->actionRoutes["list"]) : redirect()->back(500);
    }
}
