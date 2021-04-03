<?php

namespace App\Services;

use App\Classes\UploadResult;
use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Http\UploadedFile;

class CloudinaryImageService implements ImageServiceInterface
{
    public function upload(UploadedFile $file)
    {
        $url = cloudinary()->upload($file->getRealPath())->getSecurePath();
        
        return new UploadResult($url);
    }
}