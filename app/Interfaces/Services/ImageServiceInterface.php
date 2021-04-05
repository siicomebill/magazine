<?php

namespace App\Interfaces\Services;

use App\Classes\UploadResult;
use Illuminate\Http\UploadedFile;

interface ImageServiceInterface
{
    /**
     * Upload the given image file.
     * 
     * @param UploadedFile $file The file to be uploaded.
     * @return UploadResult The result of the upload operation.
     */
    public function upload(UploadedFile $file);
}