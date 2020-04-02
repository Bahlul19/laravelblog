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

      <form action="{{ route('store.student') }}" method="post">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" name="student_name" class="form-control" placeholder="Student Namee" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Stuent Email</label>
              <input type="text" name="student_email" class="form-control" placeholder="Student Email" id="title" required data-validation-required-message="Please product name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>

           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" name="phone" class="form-control" placeholder="Student Phone" id="title" required data-validation-required-message="Please product name.">
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