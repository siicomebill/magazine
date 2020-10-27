<?php

namespace App\Repositories;

use App\Classes\ReactionInfo;
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

        return $this->getReactions($item);
    }

    public function getReactions(Reactable $item)
    {
        $reactant = $item->getLoveReactant();

        $reactions = $reactant->getReactionCounters();

        $result = [];

        foreach($reactions as $r){
            $type = $r->getReactionType();

            $result[] = (new ReactionInfo($type->id, $type->name, $r->count))->toArray();
        }

        return $result;
    }
}