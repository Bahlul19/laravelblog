<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //show method
    public function show($posts)
    {
        $myName = "Testing";
        return view('posts',
        [
            'myName' => $myName
        ]);
    }

    public function index()
    {
        $nameIndex = "Testing";

        return view('posts/index',
        [
            'nameIndex' => $nameIndex
        ]);

        //$this->set(compact('nameIndex'));
    }

    public function postSlugsValues()
    {
        $posts = DB::table('posts')->where('slug', $slug)->first();
        dd($posts);
    }
}
