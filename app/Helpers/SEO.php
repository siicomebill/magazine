<?php

namespace App\Helpers;

use App\Interfaces\Models\SEOCompatibleInterface;
use Meta;

class SEO {
    public static function set(SEOCompatibleInterface $item)
    {
        $c = $item->toSEOInfo();

        Meta::title("$c->title · " . config('app.name'));
        Meta::set('description', $c->description);
        Meta::set('author', $c->author);
        Meta::set('image', $c->image);
    }
}