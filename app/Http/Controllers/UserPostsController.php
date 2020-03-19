<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserPostsController extends Controller
{
    public function writePost()
    {
        $category = DB::table('categories')->get();
        return view('posts.writepost', compact('category'));
    }

    public function storePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:25|min:4',
            'details' => 'required|unique:posts|max:25|min:4',
            'image' => 'required | mimes:jpeg,jpg,png,JPEG,JPG,PNG | max:1000',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $image = $request->file('image');

        if($image)
        {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
            $storeData = DB::table('posts')->insert($data);
            if($storeData)
            {
                return Redirect()->route('all.category')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }

        }
        else
        {
            $posts = DB::table('posts')->insert($data);
            if($posts)
            {
                return Redirect()->route('all.category')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }
        }
    }

    public function getAllPost()
    {
        $posts = DB::table('posts')
                ->join('categories','posts.category_id','categories.id')
                ->select('posts.*','categories.name')
                ->get();
     
        return view('posts.all_posts', compact('posts'));
    }

    public function getIndividualPosts($id)
    {
        $posts = DB::table('posts')->
                 join('categories','posts.category_id','categories.id')
                 ->select('posts.*','categories.name')
                 ->where('posts.id', $id)->first();

        return view('posts.view_post', compact('posts'));
    }

    public function editPost($id)
    {
        $category = DB::table('categories')->get();
        $posts = DB::table('posts')->where('id', $id)->first();

        return view('posts.edit_post', compact('category', 'posts'));
    }

    public function updatePost(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:25|min:4',
            'image' => 'mimes:jpeg,jpg,png,JPEG,JPG,PNG | max:100000',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $image = $request->file('image');

        if($image)
        {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['image'] = $image_url;
            unlink($request->old_photo);
            $posts = DB::table('posts')->where('posts.id', $id)->update($data);
            if($posts)
            {
                return Redirect()->route('all.posts')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }

        }
        else
        {
            $data['image'] = $request->old_photo;
            $posts = DB::table('posts')->where('posts.id', $id)->update($data);
            if($posts)
            {
                return Redirect()->route('all.posts')->with('success','Posts are inserted successfully');
            }
            else
            {
                return back()->with('error', 'Posts are not inserted successfully');
            }
        }
    }

    public function deletePost($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;
        $postsDelete = DB::table('posts')->where('id', $id)->delete();
        if($postsDelete)
        {
            unlink($image);
            return Redirect()->route('all.posts')->with('success','Posts are deleted successfully');
        }
        else
        {
            return back()->with('error', 'Posts is not deleted successfully');
        }
    }

}
