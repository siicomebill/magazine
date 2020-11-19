<?php

namespace App\Models;

use App\Classes\SEOInfo;
use App\Interfaces\Models\SEOCompatibleInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SEOCompatibleInterface
{
    use HasFactory;

    protected $fillable = [
        "name",
        "snippet",
        "parent_id",
        "image",
    ];

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany('App\Models\Article')->latest();
    }

    public function latestArticles()
    {
        return $this->articles()->take(8);
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function toSEOInfo(): SEOInfo
    {
        return new SEOInfo($this->name, $this->snippet, null, $this->image);
    }
}
