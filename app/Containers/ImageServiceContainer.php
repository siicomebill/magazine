<?php

namespace App\Containers;

use App\Interfaces\Services\ImageServiceInterface;

class ImageServiceContainer
{
    protected $imageService;

    public function __construct(ImageServiceInterface $service)
    {
        $this->imageService = $service;
    }

    public function upload($request)
    {
        return $this->imageService->upload($request);
    }
}