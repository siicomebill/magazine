<?php

namespace App\Classes;

use Illuminate\Contracts\Support\Arrayable;

class ReactionInfo implements Arrayable
{
    private $id;
    private string $name;
    private int $count;

    public function __construct($id, string $name, int $count = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->count = $count;
    }

    public function toArray()
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "count" => $this->count,
        ];
    }
}