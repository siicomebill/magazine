<?php

namespace App\Traits;

trait HasPublishingDate
{
    public function scopePublic($query)
    {
        return $query->where('published_at', '<', now())->orWhereNull('published_at');
    }
}