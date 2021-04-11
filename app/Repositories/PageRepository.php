<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository extends ResourceRepository {
    protected $model = Page::class;

    public function get(string $slug = "")
    {
        $model = $this->find($slug);

        return $model;
    }

    public function find($slug, int $id = null)
    {
        if($slug){
            $model = $this->model::where('slug', $slug)->with(['components'])->firstOrFail();
        }
        elseif($id){
            $model = $this->model::where('id', $id)->with(['components'])->firstOrFail();
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

    public function latest(int $limit = 0)
    {
        return $this->asModel()->orderBy('lft', 'asc');
    }

    public function delete($id)
    {
        return $this->find('', $id)->delete();
    }
}