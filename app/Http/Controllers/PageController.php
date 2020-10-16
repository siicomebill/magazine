<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Http\Requests\PageRequest;
use App\Repositories\PageRepository;
class PageController extends ResourceController
{
    protected $routeNamePrefix = "pages";
    protected $pageComponents = [
        "managerPage" => "PageManager",
        "editItemPage" => "EditPage"
    ];

    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
    }

    /**
     * Create or update an element of the specified resource.
     * 
     * @param PageRequest $request
     */
    public function store(PageRequest $request)
    {
        return $this->save($request);
    }
}
