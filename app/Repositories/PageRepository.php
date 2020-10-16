<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Support\Arr;

class PageRepository extends ConfigurationRepository {
    protected $model = Page::class;

    public function get(array $elements = [])
    {
        $query = $this->model::whereNotNull('content')->orWhereNotNull('details');

        if($elements)
            $query = $query->whereIn('name', $elements);

        $models = $query->get();

        $result = [];

        foreach ($models as $value) {
            $data = $value->toArray();
            $result[$data['name']] = Arr::except($data, 'name');
        }

        return $result;
    }
}