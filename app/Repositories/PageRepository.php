<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository extends ResourceRepository {
    protected $model = Page::class;
}