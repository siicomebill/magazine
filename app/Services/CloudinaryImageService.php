<?php

namespace App\Services;

use App\Classes\UploadResult;
use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Http\UploadedFile;
use JD\Cloudder\Facades\Cloudder;

class CloudinaryImageService implements ImageServiceInterface
{
    public function upload(UploadedFile $file)
    {
        $result = Cloudder::upload($file->path())->getResult();
        return new UploadResult($result['url'], $result['public_id']);
    }
}