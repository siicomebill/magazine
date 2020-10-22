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
            $model = $this->model::where('slug', $slug)->with('components')->firstOrFail();
        }
        else {
            $model = $this->model::with('components')->all();
        }

        $data = $model->toArray();

        $result = Arr::except($data, 'slug');

        return $result;
    }
}