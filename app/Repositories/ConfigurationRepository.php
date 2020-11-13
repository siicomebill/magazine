<?php

namespace App\Repositories;

use App\Models\Configuration;
use Illuminate\Support\Arr;

class ConfigurationRepository extends ResourceRepository
{
    protected $model = Configuration::class;

    public function get(array $elements = [])
    {
        $query = $this->model::whereNotNull('content');

        if($elements)
            $query = $query->whereIn('name', $elements);

        $models = $query->get();

        $result = [];

        foreach ($models as $value) {
            $result[$value->name] = Arr::except($value->content, 'name');
        }

        return $result;
    }

    public function latest(int $limit = 0)
    {
        return $this->asModel();
    }
}