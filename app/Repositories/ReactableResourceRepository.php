<?php

namespace App\Repositories;

use App\Classes\ReactionInfo;
use App\Interfaces\Repositories\ReactableResourceRepositoryInterface;
use Cog\Contracts\Love\Reactable\Models\Reactable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable;
use Cog\Laravel\Love\Reaction\Models\Reaction;
use Cog\Laravel\Love\ReactionType\Models\ReactionType;

abstract class ReactableResourceRepository extends ResourceRepository implements ReactableResourceRepositoryInterface
{
    protected $reactionModel = Reaction::class;

    public function react(Reacterable $user, Reactable $item, string $type = 'Like')
    {
        $reacter = $user->viaLoveReacter();

        //NOTE Allows multiple reactions
        if($reacter->hasNotReactedTo($item, $type))
            $reacter->reactTo($item, $type);
        else
            $reacter->unreactTo($item, $type);

        return $this->getReactions($item);
    }

    public function getReactions(Reactable $item)
    {
        $reactant = $item->getLoveReactant();

        $reactions = collect($reactant->getReactionCounters());

        $result = collect([]);
        $totalReactionsInfo = collect([]);

        $reactionTypes = ReactionType::whereNotIn('id', $reactions->pluck('reaction_type_id'))->get();

        foreach($reactionTypes as $type){
            $totalReactionsInfo[] = (new ReactionInfo($type->id, $type->name, 0))->toArray();
        }

        foreach($reactions as $r){
            $type = $r->getReactionType();

            $result[] = (new ReactionInfo($type->id, $type->name, $r->count))->toArray();
        }

        return ($totalReactionsInfo->merge($result));
    }
}