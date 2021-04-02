<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "propertyName",
    ];

    public function pages(){
        return $this->belongsToMany('App\Models\Page')->using('App\Models\PageComponent');
    }
}
