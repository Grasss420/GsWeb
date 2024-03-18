<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GsMLoginController extends \App\Http\Controllers\Auth\LoginController
{
    protected $realm = "member";
}
