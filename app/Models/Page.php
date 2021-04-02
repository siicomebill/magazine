<?php

namespace App\Models;

use App\Classes\SEOInfo;
use App\Interfaces\Models\SEOCompatibleInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements SEOCompatibleInterface
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
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
        $collection = $this->belongsToMany('App\Models\Component')->using('App\Models\PageComponent');
        
        return $collection ?? [];
    }

    public function toSEOInfo(): SEOInfo
    {
        return new SEOInfo($this->name);
    }
}
