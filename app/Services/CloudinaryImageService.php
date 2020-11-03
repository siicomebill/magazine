<?php

namespace App\Services;

use App\Interfaces\Services\ImageServiceInterface;

class CloudinaryImageService implements ImageServiceInterface
{
    public function upload($request)
    {
        dd("Cloudinary service -> Upload method");
    }
}