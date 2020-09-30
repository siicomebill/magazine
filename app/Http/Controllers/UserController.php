<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends ResourceController
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

    public function editItemPage(Request $request, $id = null, array $additionalData = [])
    {
        return parent::editItemPage($request, $id, [
            "roles" => Role::all(['name', 'id'])
        ]);
    }
}
