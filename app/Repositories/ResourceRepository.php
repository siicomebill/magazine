<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ResourceRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ResourceRepository implements ResourceRepositoryInterface
{
    protected $model = Model::class;

    public final function asModel()
    {
        return new $this->model;
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store($request)
    {
        throw new Exception("Store method is not defined on generic resource repository");
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}