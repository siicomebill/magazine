<?php

namespace App\Interfaces\Repositories;

interface FeedableResourceRepositoryInterface extends ResourceRepositoryInterface
{
    public function getFeedItems();
}