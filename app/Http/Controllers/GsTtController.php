<?php

namespace Grassstation\Http\Controllers;

use Illuminate\Http\Request;

class GsTtController extends GsController
{
    //
    protected $viewPrefix = "tats";

    public function works(){
        return view($this->viewPrefix.'.works');
    }
}
