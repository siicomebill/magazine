<?php

namespace App\Interfaces\Repositories;

use Cog\Contracts\Love\Reactable\Models\Reactable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable;

interface ReactableResourceRepositoryInterface extends ResourceRepositoryInterface
{
    public function react(Reacterable $user, Reactable $item);
}