<?php

namespace App\Services;

use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Http\UploadedFile;

class CloudinaryImageService implements ImageServiceInterface
{
    public function upload(UploadedFile $file)
    {
        dd("Cloudinary service -> Upload method");
    }
}