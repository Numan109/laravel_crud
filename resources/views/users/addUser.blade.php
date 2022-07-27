@extends('master')

@section('content')

<!-- /.card -->
<!-- Horizontal Form -->

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}" id="message">{{ Session::get('message') }}</p>
@endif


<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Create User</h3>
  </div>


  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach 
    </ul>
  </div>
  @endif

  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{url('save-user')}}" method="post">
    @csrf
    <div class="card-body">

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
        </div>
      </div>


      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2">Remember me</label>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Submit</button>
      <button type="submit" class="btn btn-default float-right">Cancel</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->

<script>
  $("document").ready(function() {
    setTimeout(function() {
      $("#message").remove();
    }, 5000); // 5 secs

  });
</script>

@endsection