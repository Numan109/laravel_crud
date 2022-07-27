@extends('master')
@section('content')
<style>
    .img_size{
        height: 50px;
        width: 20px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>View Category</h2>
                    <a href="{{url('add-catagory')}}" class="btn btn-primary btn-sm float-right">Add category</a>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Category</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(!empty($categories))
                        @foreach($categories as $key=>$row)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->code}}</td>
                            <td>{{$row->catagory_name}}</td>
                            <td>{{$row->product_name}}</td>
                            <td>{{$row->price}}</td>
                            <td class="img_size">
                                <a href="{{url('images/',$row->image_path)}}"  data-toggle="lightbox" data-title="{{$row->product_name}}" data-footer="">
                                    <img src="{{url('images/',$row->image_path)}}" alt="Not Found"  class="img-fluid">
                                </a>
                            </td>
                            <td >
                                <a href="{{url('edit-category',$row->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>Data Not Found</td>
                        </tr>
                       @endif
                        
                    </tbody>
                    </table>
                    <div class="d-felx justify-content-end" style="margin-top: 20px; margin-left: 600px;">

{{ $categories->links('vendor.pagination.custom') }}

</div> 
                </div>
            </div>
        </div>
    </div>
</div>



@endsection