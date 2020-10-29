<?php

namespace App\Helpers;

use App\Interfaces\Models\SEOCompatibleInterface;
use Meta;

class SEO {
    public static function set(SEOCompatibleInterface $item, string $separator = "·")
    {
        $c = $item->toSEOInfo();

        Meta::title($c->title . " $separator " . config('app.name'));
        Meta::set('description', $c->description);
        Meta::set('author', $c->author);
        Meta::set('image', $c->image);
    }
}