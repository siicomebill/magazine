<?php

namespace App\Containers;

use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Http\UploadedFile;

class ImageServiceContainer
{
    protected $imageService;

    public function __construct(ImageServiceInterface $service)
    {
        $this->imageService = $service;
    }

    public function upload(UploadedFile $file)
    {
        return $this->imageService->upload($file);
    }
}