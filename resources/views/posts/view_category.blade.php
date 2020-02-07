@extends('welcome')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
        <a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
            <a href="{{ route('all.category')}}" class="btn btn-info">List Category</a>
        </p>
         
        <div class="panel panel-default">
          <div class="panel-heading"><h2>Information About Data</h2></div>
          <div class="panel-body">

            Category ID : {{ $category->id }} <br/>

            Category Name : {{ $category->name }} <br/>

            Category Name : {{ $category->slug }} <br/>

          </div>
        </div>

      </div>
    </div>
  </div>
@endsection