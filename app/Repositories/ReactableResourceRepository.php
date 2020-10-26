<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ReactableResourceRepositoryInterface;
use Cog\Contracts\Love\Reactable\Models\Reactable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable;

class ReactableResourceRepository extends ResourceRepository implements ReactableResourceRepositoryInterface
{
    public function react(Reacterable $user, Reactable $item)
    {
        $reacter = $user->viaLoveReacter();

        if($reacter->hasNotReactedTo($item))
            $reacter->reactTo($item, 'Like');
        else
            $reacter->unreactTo($item, 'Like');

        $reactant = $item->getLoveReactant();

        return $reactant->getReactionCounters();
    }
}