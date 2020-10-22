<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageComponent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "page_components";
}
