<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\ResourceController;
use App\Models\Configuration;
use App\Repositories\ConfigurationRepository;
use Illuminate\Http\Request;

class ConfigurationController extends ResourceController
{
    protected $routeNamePrefix = "config";
    protected $pageComponents = [
        "listPage" => "",
        "managerPage" => "ConfigurationManager",
        "newItemPage" => "EditConfiguration",
    ];

    public function __construct(ConfigurationRepository $configuration)
    {
        parent::__construct($configuration);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $config = Configuration::find($data["name"]);

    //     if($config){
    //         $config->update($data);
    //     }
    //     else {
    //         $config->save($data);
    //     }

    //     redirect()->back();
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Configuration  $configuration
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Configuration $configuration)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Configuration  $configuration
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Configuration $configuration)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Configuration  $configuration
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Configuration $configuration)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Configuration  $configuration
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Configuration $configuration)
    // {
    //     //
    // }
}
