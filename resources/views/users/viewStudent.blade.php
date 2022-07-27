@extends('master')
@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}" id="message">{{ Session::get('message') }}</p>
@endif


<div class="container">
    <div class="row">
        <div class="col col-md-12">
            <div class="card">
                <div class="card-header">
                    Student Information
                    <a href="{{url('add-student')}}" class="btn btn-info btn-sm float-right">Add Student</a>
                </div>
               
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Roll</th>
                                <th scope="col">class</th>
                                <th scope="col">Father's name</th>
                                <th scope="col">mother's name</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Contuct number</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($students))
                            @foreach($students as $key=>$value)
                            <tr>
                                <th>{{$value->id}}</th>
                                <td>{{$value->roll}}</td>
                                <td>{{$value->class}}</td>
                                <td>{{$value->father_name}}</td>
                                <td>{{$value->mother_name}}</td>
                                <td>{{$value->date_of_birth}}</td>
                                <td>{{$value->contuct_number}}</td>
                                <td>
                                    <a href="{{url('images/',$value->image)}}" data-toggle="lightbox" data-title="{{$value->name}}" data-footer="">
                                        <img src="{{url('images/',$value->image)}}" alt="Image not found" height="50px" width="100px">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{URL::to('edit-student',$value->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <!-- <a href="{{URL::to('delete-student',$value->id)}}" onclick="return confirm('Are you sure wnat to delete ?')" class="btn btn-danger btn-sm">Delete</a> -->
                                    <a href="{{URL::to('delete-student',$value->id)}}" class="btn btn-danger btn-sm delete-confirm">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                            @else
                            <h4 class="text-warning" colspan="10">Data not found!!!</h4>
                            @endif
                        </tbody>

                     
                    </table>

                    <div class="d-felx justify-content-end">

                    {{ $students->links('vendor.pagination.custom') }}

                  </div>
                   

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

@endsection