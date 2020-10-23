<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PageComponent extends Pivot
{
    use HasFactory;

    public $timestamps = false;
}
