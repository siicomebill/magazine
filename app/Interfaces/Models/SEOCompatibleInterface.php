<?php

namespace App\Interfaces\Models;

use App\Classes\SEOInfo;

interface SEOCompatibleInterface
{
    /**
     * Transform the current object into a SEO-compatible format.
     */
    public function toSEOInfo(): SEOInfo;
}