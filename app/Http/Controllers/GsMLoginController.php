<?php

namespace Grassstation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GsMLoginController extends \Grassstation\Http\Controllers\Auth\LoginController
{
    protected $realm = "member";
}
