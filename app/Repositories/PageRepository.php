<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Arr;

class PageRepository extends ResourceRepository {
    protected $model = Page::class;

    public function get(string $slug = "")
    {
        $query = $this->model::whereNotNull('content')->orWhereNotNull('details');

        $model = [];

        if($slug){
            $query = $query->where('slug', $slug);

            $model = $query->first();
        }
        else {
            $model = $query->get();
        }

        $data = $model->toArray();

        $result = Arr::except($data, 'slug');

        return $result;
    }
}