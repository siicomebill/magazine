<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "snippet",
        "parent",
    ];

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent', 'id');
    }
}
