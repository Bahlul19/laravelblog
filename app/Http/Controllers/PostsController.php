<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function writePost()
    {
        return view('posts.writepost');
    }

    public function addCategory()
    {
        return view('posts.add_category');
    }
}
