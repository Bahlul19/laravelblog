<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        return view('Hello.index');
    }

    public function aboutus()
    {
        return view('Hello.aboutus');
    }
}
