<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends ResourceRepository
{
    protected $model = User::class;

    public function addRole()
    {
        dd("add role with user repo");
    }
}