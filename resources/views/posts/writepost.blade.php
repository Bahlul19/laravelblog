@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="/posts.add_category" class="btn btn-danger">Add Category</a>
            <a href="#" class="btn btn-info">List Category</a>
        </p>
        
        <form name="sentMessage" id="contactForm" novalidate>

            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Category ID</label>
                 <select class="form-control" name="category_id">
                     <option>ABCD</option>
                     <option>EFGH</option>
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