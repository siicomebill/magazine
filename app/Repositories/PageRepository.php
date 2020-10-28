<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Arr;

class PageRepository extends ResourceRepository {
    protected $model = Page::class;

    public function get(string $slug = "")
    {
        $model = $this->find($slug);

        return $model;
    }

    public function find($slug)
    {
        if($slug){
            $model = $this->model::where('slug', $slug)->with(['components'])->firstOrFail();
        }
        else {
            $model = $this->model::all();
        }

        return $model;
    }

    public function softFind($id)
    {
        return $this->model::with(['components'])->find($id);
    }

    public function afterStore($model, $request)
    {
        $model->components()->sync($request->components);
    }
}