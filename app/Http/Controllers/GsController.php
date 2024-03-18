<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GsController extends Controller
{
    protected $viewPrefix = "gs";
    public function index()
    {
        return view($this->viewPrefix.'.index');
    }
    public function menu()
    {
        return view($this->viewPrefix.'.menu');
    }
    public function contact()
    {
        return view($this->viewPrefix.'.contact');
    }
}
