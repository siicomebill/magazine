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
        "slug",
    ];

    protected $casts = [
        "content" => "array",
        "details" => "array",
    ];

    public function components(){
        $collection = $this->hasManyThrough('App\Models\Component', 'App\Models\PageComponent', 'page_id', 'id');
        
        return $collection ?? [];
    }
}
