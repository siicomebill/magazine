<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository extends ConfigurationRepository {
    protected $model = Page::class;
}