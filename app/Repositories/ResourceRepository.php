<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FeedableResourceRepositoryInterface;
use App\Interfaces\Repositories\ResourceRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ResourceRepository implements ResourceRepositoryInterface, FeedableResourceRepositoryInterface
{
    protected $model = Model::class;

    public final function asModel()
    {
        return new $this->model;
    }

    public function list(array $params = [])
    {
        return $params ? $this->asModel()->all($params) : $this->asModel()->all();
    }

    public function get()
    {
        return $this->latest()->get();
    }

    public function important()
    {
        return $this->latest(5);
    }

    public function others()
    {
        return $this->latest();
    }

    public function latest(int $limit = 0)
    {
        $query = $this->model::latest('updated_at');

        if ($limit)
            $query = $query->limit($limit);

        return $query;
    }

    public function find($id)
    {
        return $this->model::findOrFail($id);
    }

    public function softFind($id)
    {
        return $this->model::find($id) ?? null;
    }

    public function store($request)
    {
        $model = new $this->model;
        $id = $request[$model->getKeyName()];

        if ($id) {
            $item = $model::find($id);

            if ($item) {
                $item->update($request->all());
                $this->afterStore($item, $request);
                return true;
            } else {
                //TODO Populate error bag
                return false;
            }
        } else {
            $item = $this->model::create($request->all());
            $this->afterStore($item, $request);
            return true;
        }
    }

    public function afterStore($model, $request){}

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function random($limit = 1)
    {
        return $this->model::inRandomOrder()->limit($limit);
    }

    public function paginated($perPage = 5)
    {
        return $this->latest()->paginate($perPage);
    }

    public function getFeedItems()
    {
        return $this->latest(20)->get();
    }
}
