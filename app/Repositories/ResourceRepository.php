<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ResourceRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ResourceRepository implements ResourceRepositoryInterface
{
    protected $model = Model::class;

    public function store($request)
    {
        throw new Exception("Store method is not defined on generic resource repository");
    }

    public function delete($id)
    {
        //TODO
    }
}