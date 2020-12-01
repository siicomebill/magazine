<?php

namespace App\Models;

use App\Classes\SEOInfo;
use App\Interfaces\Models\SEOCompatibleInterface;
use App\Traits\HasPublishingDate;
use Cog\Contracts\Love\Reactable\Models\Reactable as ReactableInterface;
use Cog\Laravel\Love\Reactable\Models\Traits\Reactable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Article extends Model implements ReactableInterface, SEOCompatibleInterface
{
    use HasFactory;
    use Reactable; //FIXME Disable eager loading of reactions
    use HasEagerLimit;
    use HasPublishingDate;

    protected $fillable = [
        "title",
        "snippet",
        "content",
        "category_id",
        "user",
        "image",
        "published_at",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    protected $casts = [
        "content" => "array",
    ];

    protected $with = [
        "author",
        "category"
    ];

    public function serializeDate(DateTimeInterface $date)
    {
        return $date->format("d-m-Y H:i");
    }

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

    public function toSEOInfo(): SEOInfo
    {
        return new SEOInfo($this->title, $this->snippet, $this->author->name, $this->image);
    }
}
