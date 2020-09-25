<?php

namespace App\Interfaces\Repositories;

interface ResourceRepositoryInterface
{
    public function store($request);

    public function delete($id);
}