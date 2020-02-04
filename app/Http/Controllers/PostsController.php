<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Class_;

use DB;
use Illuminate\Support\Facades\Redirect;

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

    public function storeCategory(Request $request)
    {
        //validation 
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->insert($data);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        if($category)
        {
            return back()->with('success','Cateegories are inserted successfully');
        }
        else
        {
            return back()->with('error', 'Cateegories are not inserted successfully');
        }
        
    }
}
