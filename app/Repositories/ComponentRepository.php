<?php

namespace App\Repositories;

use App\Models\Component;

class ComponentRepository extends ResourceRepository
{
    protected $model = Component::class;

    public function latest(int $limit = 0)
    {
        return $this->asModel();
    }
}
