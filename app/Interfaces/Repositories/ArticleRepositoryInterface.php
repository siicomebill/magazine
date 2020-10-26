<?php

namespace App\Interfaces\Repositories;

use Cog\Contracts\Love\Reactable\Models\Reactable;
use Cog\Contracts\Love\Reacterable\Models\Reacterable;

interface ArticleRepositoryInterface extends ResourceRepositoryInterface
{
    public function store($request, $user = null);
    public function react(Reacterable $user, Reactable $item);
}