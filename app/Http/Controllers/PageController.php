<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;

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
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->save($request);
    }
}
