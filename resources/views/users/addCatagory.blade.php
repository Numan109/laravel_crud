@extends('master')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}" id="message">{{ Session::get('message') }}</p>
@endif

<style>
  .error {
    color: red;
  }
</style>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Catagory</h3>
    <a href="{{url('view-catagory')}}" class="btn btn-warning btn-sm float-right">View</a>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{url('save-catagory')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="code">Code</label>
        <input type="text" class="form-control" value="{{old('code')}}" name="code" id="code" placeholder="Enter catagory code">
        <P class="error">{{$errors->first('code')}}</P>
      </div>
      <div class="form-group">
        <label for="catagory_name">Catagory</label>
        <input type="text" class="form-control" value="{{old('catagory_name')}}" name="catagory_name" id="catagory_name" placeholder="Enter catagory name">
        <P class="error">{{$errors->first('catagory_name')}}</P>
      </div>
      <div class="form-group">
        <label for="product_name">Product name</label>
        <input type="text" class="form-control" value="{{old('product_name')}}" name="product_name" id="product_name" placeholder="Enter product name">
        <P class="error">{{$errors->first('product_name')}}</P>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" value="{{old('price')}}" name="price" id="price" placeholder="Enter catagory name">
        <P class="error">{{$errors->first('price')}}</P>
      </div>
      <div class="form-group">
        <label for="product_image">Product image</label>
        <input type="file" class="form-control" name="image" id="product_image">
        <p class="error">{{$errors->first('image')}}</p>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
@endsection