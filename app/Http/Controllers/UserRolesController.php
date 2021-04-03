<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Interfaces\Controllers\ResourceControllerChildInterface;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRolesController extends ResourceController implements ResourceControllerChildInterface
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
}
