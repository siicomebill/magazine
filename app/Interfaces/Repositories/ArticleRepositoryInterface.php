<?php

namespace App\Interfaces\Repositories;

interface ArticleRepositoryInterface extends ResourceRepositoryInterface
{
    public function store($request, $user = null);
}