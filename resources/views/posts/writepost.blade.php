@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
          <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
          <a href="{{ route('all.category') }}" class="btn btn-info">List Category</a>
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

      <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <div>Category Name</div>
                  <label>Category ID</label>
                 <select class="form-control" name="category_id">
                   @foreach($category as $categories)
                 <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                    @endforeach
                 </select>
                  <p class="help-block text-danger"></p>
                </div>
            </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Title</label>
              <input type="text" name="title" class="form-control" placeholder="Product name" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea name="details" rows="5" class="form-control" placeholder="Product Details" id="details" required data-validation-required-message="Please enter a product details."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Product Image</label>
              <input type="file" name="image" class="form-control" placeholder="Product image" id="image">
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