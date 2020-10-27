<?php

namespace App\Interfaces\Repositories;

use App\Classes\ReactionInfo;
use Cog\Contracts\Love\Reactable\Models\Reactable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable;

interface ReactableResourceRepositoryInterface extends ResourceRepositoryInterface
{
    /**
     * React / Unreact to a piece of content and return reaction info.
     * 
     * @param Reacterable $user The entity giving the reaction
     * @param Reactable $item The content being reacted to
     * 
     * @return ReactionInfo[]|array
     */
    public function react(Reacterable $user, Reactable $item);

    /**
     * Get all the reactions for a given piece of content.
     * 
     * @param Reactable $item The content being reacted to
     * 
     * @return ReactionInfo[]|array
     */
    public function getReactions(Reactable $item);
}