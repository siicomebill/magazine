<?php
// Thank you Constantin Druc!
// View his article on pagination here: https://cdruc.com/paginating-laravel-api-resources-in-inertiajs-applications/
namespace App\Helpers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginatedCollection extends ResourceCollection
{
    public function __construct($resource)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
    }

   
    public function toArray($request)
    {
        return $this->resource;
    }
}
 