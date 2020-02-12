@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ route('all.category') }}" class="btn btn-info">List Category</a>
            <a href="{{ route('all.post') }}" class="btn btn-danger">List Posts</a>
        </p>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Posts Title</th>
              <th>Posts Details</th>
              <th>Posts Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($posts as $post)

            <tr>
              <td>{{ $post-> id}}</td>
              <td>{{ $post-> category_id}}</td>
              <td>{{ $post-> title}}</td>
              <td>{{ $post-> details}}</td>
              <td><img src="{{ URL::to($post->image)}}" style="height: 70px; width: 100px"></td>
              <td>
                <a href="{{ URL::to('posts.edit_post/'. $post->id) }}" class="btn btn-info ">Edit</a>
                <a href="{{ URL::to('posts.delete_post/'. $post->id) }}" class="btn btn-danger" id="delete">Delete</a>
              <a href="{{ URL::to('posts.view_post/'. $post->id) }}" class="btn btn-success">View</a>
              </td>
            </tr>
            
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection