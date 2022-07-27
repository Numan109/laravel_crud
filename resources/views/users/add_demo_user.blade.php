@extends('master')
@section('content')
<!-- ===================Start Success Message===================== -->
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}" id="message">{{ Session::get('message') }}</p>
@endif

<!-- ===================End Success Message===================== -->
<!-- ===================start form============================== -->
<div class="card card-info">
    <div class="card-header">
        <h3>Create User</h3>
    </div>



    <div class="card-body">

        <form action="{{url('demouser')}}" method="post">
            @csrf
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Full name">
                @if($errors->any())
                <P>{{$errors->first('name')}}</P>
                @endif
  

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                <P>{{$errors->first('email')}}</P>

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                <input type="phone" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Phone">
                <P>{{$errors->first('phone')}}</P>


            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" class="form-control" value="{{ old('password') }}" name="password" placeholder="Password">
                <P>{{$errors->first('password')}}</P>
                

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" class="form-control" name="re_password" value="{{ old('re_password') }}" placeholder="Retype password">
                <P>{{$errors->first('re_password')}}</P>
             
            </div>
            <div class="row col-sm-11 mb-3" style="margin: auto;">
                <div class="col-10">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <div class=" col-sm-11 mb-3" style="margin: auto;">
            <a href="login.html" class="text-center">I already have a membership</a>

        </div>

    </div>
    <!-- /.form-box -->
</div><!-- /.card -->

@endsection