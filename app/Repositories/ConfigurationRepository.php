<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationRepository extends ResourceRepository
{
    protected $model = Configuration::class;

    public function get()
    {
        $models = ($this->model::all());
        $result = [];

        foreach ($models as $value) {
            $result[$value->name] = $value->content;
        }

        return $result;
    }
}