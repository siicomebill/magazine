<?php

namespace App\Repositories;

use App\Models\Sponsor;

class SponsorRepository extends ResourceRepository
{
    protected $model = Sponsor::class;

    public function important()
    {
        return $this->model::inRandomOrder()->limit(10);
    }

    public function get()
    {
        $this->asModel()->get();
    }
}