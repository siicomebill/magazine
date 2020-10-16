<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "content",
        "details",
    ];

    protected $casts = [
        "content" => "array",
        "details" => "array",
    ];
}
