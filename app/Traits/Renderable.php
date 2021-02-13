<?php

namespace App\Traits;

use Inertia\Inertia;

trait Renderable
{
    /**
     * The page renderer class.
     * 
     * @var mixed
     */
    protected $renderer = Inertia::class;

    /**
     * Return a view with the provided data.
     * 
     * @param string $viewName The name of the view to render.
     * @param $data The data to insert in the view
     */
    public function render(string $viewName, $data = []){
        //TODO Decide what view to render (Client side or server side)
        if (request()->AMP){
            return view("amp." . strtolower($viewName), $data);
        }
        else {
            return $this->renderer::render($viewName, $data);
        }
    }
}