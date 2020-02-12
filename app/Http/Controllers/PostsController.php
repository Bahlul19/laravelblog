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
        if($category)
        {
            return Redirect()->route('all.category')->with('success','Cateegories are inserted successfully');
        }
        else
        {
            return back()->with('error', 'Cateegories are not inserted successfully');
        }
        
    }

    public function allCategory()
    {
        $category = DB::table('categories')->get();
        return view('posts.all_category', compact('category'));
    }

    public function viewCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('posts.view_category', compact('category'));
    }

    public function deleteCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->delete();
        if($category)
        {
            return Redirect()->route('all.category')->with('success','Categories are deleted successfully');
        }
        else
        {
            return back()->with('error', 'Categories is not deleted successfully');
        }
    }

    public function editCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('posts.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:25|min:4',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $category = DB::table('categories')->where('id', $id)->update($data);
        if($category)
        {
            return Redirect()->route('all.category')->with('success','Categories are updated successfully');
        }
        else
        {
            return back()->with('error', 'Categories are not updated successfully');
        }
    }
}
