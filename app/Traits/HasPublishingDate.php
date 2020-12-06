<?php

namespace App\Traits;

trait HasPublishingDate
{
    public function scopePublic($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<', now());
    }
}