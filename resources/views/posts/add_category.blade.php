@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="/posts.add_category" class="btn btn-danger">Add Category</a>
            <a href="#" class="btn btn-info">List Category</a>
        </p>
      <form action="{{ route('store.category') }}">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" name="name" class="form-control" placeholder="Category name" id="name" required data-validation-required-message="Please category name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
                <label>Category Slug</label>
                <input type="text" name="slug" class="form-control" placeholder="Category Slug" id="slug" required data-validation-required-message="Please category slug.">
              <p class="help-block text-danger"></p>
            </div>
        </div>

          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection