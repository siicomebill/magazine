<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ResourceRepositoryInterface;

class ResourceRepository implements ResourceRepositoryInterface
{
    protected $model;

    public function store($request)
    {
        dd("store");
    }

    public function delete($id)
    {
        dd("delete");
    }
}