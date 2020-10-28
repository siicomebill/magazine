<?php

namespace App\Classes;

class SEOInfo
{
    public string $title;
    public ?string $description;
    public ?string $author;
    public ?string $image;

    public function __construct(string $title, ?string $description, ?string $author = null, ?string $image = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->image = $image;
    }
}