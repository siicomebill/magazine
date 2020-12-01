<?php

namespace App\Http\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic as Policy;
use Spatie\Csp\Value;

class HumblePolicy extends Policy
{
    public function configure()
    {
        $this->addDirective(Directive::UPGRADE_INSECURE_REQUESTS, Value::NO_VALUE);
    }
}