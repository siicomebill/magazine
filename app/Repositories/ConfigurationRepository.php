<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationRepository extends ResourceRepository
{
    protected $model = Configuration::class;

    public function get(array $elements = [])
    {
        $query = $this->model::whereNotNull('content');

        foreach ($elements as $value) {
            $query = $query->where('name', $value);
        }

        $models = ($query->get());
        $result = [];

        foreach ($models as $value) {
            $result[$value->name] = $value->content;
        }

        return $result;
    }
}