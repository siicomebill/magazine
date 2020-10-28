<?php

namespace App\Interfaces\Repositories;

interface ArticleRepositoryInterface extends ReactableResourceRepositoryInterface
{
    public function store($request, $user = null);
}