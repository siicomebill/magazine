<?php

namespace App\Http\Controllers\Resources;

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
}
