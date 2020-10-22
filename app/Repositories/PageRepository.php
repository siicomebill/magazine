<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Arr;

class PageRepository extends ResourceRepository {
    protected $model = Page::class;

    public function get(string $slug = "")
    {
        $model = [];

        if($slug){
            $model = $this->model::where('slug', $slug)->with(['components'])->firstOrFail();
        }
        else {
            $model = $this->model::all();
        }

        $data = $model->toArray();

        $result = Arr::except($data, 'slug');

        return $result;
    }

    public function softFind($id)
    {
        return $this->model::with(['components'])->find($id);
    }

    public function afterStore($model, $request)
    {
        $model->components()->saveMany($request->components);
    }
}