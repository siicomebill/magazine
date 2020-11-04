<?php

namespace App\Interfaces\Services;

use Illuminate\Http\UploadedFile;

interface ImageServiceInterface
{
    public function upload(UploadedFile $file);
}