<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WebGis;

// use App\Http\Resources\WebgisResource;

class ControllerWebGis extends Controller
{
    // public function datagis(){
    //     return  WebgisResource::collection(WebGis::all());
    // }


    public function webgis_air(){
        return  WebGis::all ();
    }
}
