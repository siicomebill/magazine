<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationRepository extends ResourceRepository
{
    protected $model = Configuration::class;

    public function get(array $elements = [])
    {
        $models = $this->model::whereNotNull('content')->whereIn('name', $elements)->get();

        $result = [];

        foreach ($models as $value) {
            $result[$value->name] = $value->content;
        }

        return $result;
    }
}