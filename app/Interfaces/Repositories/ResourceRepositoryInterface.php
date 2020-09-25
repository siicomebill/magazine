<?php

namespace App\Interfaces\Repositories;

interface ResourceRepositoryInterface
{
    public function asModel();

    public function get();

    public function important();

    public function others();

    public function latest(int $limit = 0);

    public function find($id);

    public function store($request);

    public function delete($id);
}