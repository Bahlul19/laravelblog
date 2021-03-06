@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ route('all.category') }}" class="btn btn-info">List Category</a>
        </p>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

      <form action="{{ url('posts.update_category/'.$category->id) }}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" id="name"  data-validation-required-message="Please category name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Category Slug</label>
                <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" id="slug"  data-validation-required-message="Please category slug.">
              <p class="help-block text-danger"></p>
            </div>
        </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection