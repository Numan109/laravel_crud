@extends('master')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}" id="message">{{ Session::get('message') }}</p>
@endif
<div class="card  card-primary">
    <div class="card-header">
        Student Information Form
    </div>
   
    <form action="{{url('update-student',$student->id)}}" method="post" enctype="multipart/form-data">
      @csrf
    <div class="card-body">


  <div class="form-group">
    <label for="roll">Roll</label>
    <input type="text" class="form-control" name="roll" value="{{$student->roll}}" id="roll"  placeholder="Enter roll">
    <p class="error text-danger">{{$errors->first('roll')}}</p>
  </div>
  <div class="form-group">
 
    <label  for="class">Class</label>

  <select class="custom-select" name="class" id="class">
    <option selected disabled>Choose...</option>
    <option value="1" {{ ($student->class == 1) ? 'selected' : '' }}>One</option>
    <option value="2" {{ ($student->class == 2) ? 'selected' : '' }}>Two</option>
    <option value="3" {{ ($student->class == 3) ? 'selected' : '' }}>Three</option>
    <option value="4" {{ ($student->class == 4) ? 'selected' : '' }}>Four</option>
    <option value="5" {{ ($student->class == 5) ? 'selected' : '' }}>Five</option>
  </select>
  <p class="error text-danger">{{$errors->first('class')}}</p>
</div>
  <div class="form-group">
    <label for="name">Student Name</label>
    <input type="text" class="form-control" name="name" value="{{$student->name}}" id="name"  placeholder="Enter name">
    <p class="error text-danger">{{$errors->first('name')}}</p>
  </div>
  <div class="form-group">
    <label for="father_name">Father's Name</label>
    <input type="text" class="form-control" name="father_name" value="{{$student->father_name}}" id="father_name" placeholder="Enter father's name">
    <p class="error text-danger">{{$errors->first('father_name')}}</p>
  </div>
  <div class="form-group">
    <label for="mother_name">Mother's Name</label>
    <input type="text" class="form-control" name="mother_name"  value="{{$student->mother_name}}" id="mother_name"  placeholder="Enter mather's name">
    <p class="error text-danger">{{$errors->first('mother_name')}}</p>
  </div>


  <div class="form-group">
    <label for="date_of_birth">Date of Birth</label>
    <input type="date" class="form-control" name="date_of_birth" value="{{$student->date_of_birth}}" id="date_of_birth" placeholder="Enter date of birth">
    <p class="error text-danger">{{$errors->first('date_of_birth')}}</p>
  </div>
  <div class="form-group">
    <label for="contuct_number">Contuct Number</label>
    <input type="text" class="form-control" name="contuct_number" value="{{$student->contuct_number}}" id="contuct_number" placeholder="Enter contuct number">
    <p class="error text-danger">{{$errors->first('contuct_number')}}</p>
  </div>



  <div class="form-group">
    <label for="image">Student Image</label>
    <input type="hidden" name="old_image" value="{{$student->image}}">
    <a href="{{url('images/',$student->image)}}" data-toggle="lightbox" data-title="{{$student->name}}" data-footer="">
        <img src="{{url('images/',$student->image)}}" alt="Image not found" height="50px" width="100px">
    </a>
    <input type="file" class="form-control" name="image" value="{{old('image')}}" id="image">
    <p class="error text-danger">{{$errors->first('image')}}</p>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</div>

@endsection