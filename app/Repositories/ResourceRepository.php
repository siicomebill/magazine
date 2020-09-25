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

    public function all()
    {
        return $this->model::latest()->get();
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store($request)
    {
        if ($request->id) {
            $item = $this->model::find($request->id);

            if ($item) {
                $item->update($request->all());
                return true;
            } else {
                //TODO Populate error bag
                return false;
            }
        } else {
            $this->model::create($request->all());
            return true;
        }
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}