<?php

namespace App\Interfaces\Controllers;

use Illuminate\Http\Request;

interface ResourceControllerInterface {
    /**
     * Display the resource-manager page with all the necessary resources.
     * 
     * @param Request $request
     */
    function managerPage(Request $request);

    /**
     * Display the page used for inserting or editing an existing instance of the specified resource.
     * 
     * @param Request $request
     */
    function editItemPage(Request $request, $id = null, array $additionalData = []);

    /**
     * Delete an instance of the specified resource
     * 
     * @param $id
     */
    function delete($id);
}