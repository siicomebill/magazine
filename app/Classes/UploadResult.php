<?php

namespace App\Classes;

class UploadResult
{
    public string $url;
    public ?string $id;
    public bool $success;
    public string $message;

    public function __construct(string $url, ?string $id = null, bool $success = true, string $message = "Upload Successful")
    {
        $this->url = $url;
        $this->id = $id;
        $this->success = $success;
        $this->message = $message;
    }
}