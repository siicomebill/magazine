<?php

namespace App\Interfaces\Controllers;

use App\Http\Requests\ReactionRequest;
use Illuminate\Http\JsonResponse;
interface ReactableResourceControllerInterface extends ResourceControllerChildInterface
{
    /**
     * Handle the request to react to a certain piece of content
     */
    public function react(ReactionRequest $request): JsonResponse;
}