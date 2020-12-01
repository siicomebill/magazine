<?php

namespace App\Http\Policies;

use Spatie\Csp\Policies\Basic as Policy;

class HumblePolicy extends Policy
{
    public function configure()
    {
        parent::configure();

        $this->reportOnly();
    }
}