@extends('welcome')

@section('content')

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      @foreach($posts as $post)
      
      <div class="post-preview">
        <a href="{{ URL::to('posts.view_post/'. $post->id) }}">
          <h2 class="post-title">
           {{ $post->title }}
          </h2>
        </a>
          <img src="{{ URL::to($post->image)}}" style="height: 70px; width: 100px">
          <h3 class="post-subtitle">
            {{ $post->name}}
          </h3>
      
        <p class="post-meta">Posted by
          <a href="#"> {{ $post->slug }}</a>
        </p>

      </div>
      <hr>

      @endforeach
      <!-- Pager -->
      <div class="clearfix">
       {{ $posts->links() }}
      </div>
    </div>
  </div>

  @endsection
