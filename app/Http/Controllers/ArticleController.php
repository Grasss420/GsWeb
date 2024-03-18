<?php

namespace Grassstation\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    function __construct() {
        $this->middleware('auth')->except(['show']);
    }
}
