<?php

namespace App\Models;

use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements ReactableInterface
{
    use HasFactory;
    use Reactable; //FIXME Disable eager loading of reactions

    protected $fillable = [
        "title",
        "snippet",
        "content",
        "category_id",
        "user",
        "image"
    ];

    protected $casts = [
        "content" => "array"
    ];

    protected $with = [
        "author",
        "category"
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id', 'users');
    }

    public function scopeUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
