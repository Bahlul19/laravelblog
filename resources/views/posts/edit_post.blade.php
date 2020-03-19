@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          <a href="{{ route('all.posts') }}" class="btn btn-danger">List Posts</a>
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

    <form action="{{ url('posts.update_posts/'.$posts->id) }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <div>Category Name</div>
                  <label>Category ID</label>
                 <select class="form-control" name="category_id">
                   @foreach($category as $categories)
                 <option value="{{ $categories->id }}" <?php if ($categories->id == $posts->category_id)
                    echo "selected"; ?> > {{ $categories->name }} </option>
                    @endforeach
                 </select>
                  <p class="help-block text-danger"></p>
                </div>
            </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Title</label>
            <input type="text" name="title" class="form-control" value="{{ $posts->title }}" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea name="details" rows="5" class="form-control" value="{{ $posts->details }}" id="details"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Image</label>
              <input type="file" name="image" class="form-control" id="image"><br/>
              
            Old Image : <img src="{{ URL::to($posts->image) }}" style="hight: 40px; width: 100px">

            <input type="hidden" name="old_photo" value="{{ $posts->image }}">
            </div>
          </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-success" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection