@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        <a href="{{ route('add.posts') }}" class="btn btn-danger">Add Posts</a>
            <a href="{{ route('all.posts')}}" class="btn btn-info">List Posts</a>
        </p>
         
        <div class="panel panel-default">
          <div class="panel-heading"><h2>Information About Data</h2></div>
          <div class="panel-body">

            Post ID : {{ $posts->id }} <br/>

            Category Name : {{ $posts->name }} <br/>

            Post Title : {{ $posts->title }} <br/>

            Post Details : {{ $posts->details }} <br/>

            Post Image : <img src="{{ URL::to($posts->image)}}" style="height: 100px; width: 100px"> <br/>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection