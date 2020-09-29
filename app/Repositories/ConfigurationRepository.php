<?php

namespace App\Repositories;

use App\Models\Configuration;

class ConfigurationRepository extends ResourceRepository
{
    protected $model = Configuration::class;
}