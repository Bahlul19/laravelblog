@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ route('all.category')}}" class="btn btn-info">List Category</a>
        </p>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($category as $categories)

            <tr>
              <td>{{ $categories-> id}}</td>
              <td>{{ $categories-> name}}</td>
              <td>{{ $categories-> slug}}</td>
              <td>
                <a href="" class="btn btn-info btn-sm">Edit</a>
                <a href="" class="btn btn-danger btn-sm">Delete</a>
              <a href="{{ URL::to('posts.view_category/'. $categories->id) }}" class="btn btn-success btn-sm">View</a>
              </td>
            </tr>
            
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
  </div>
@endsection