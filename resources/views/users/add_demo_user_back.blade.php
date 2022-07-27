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

    <!-- ================== Show validation message============== -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- ===================End validation Message===================== -->

    <div class="card-body">

        <form action="{{url('demouser')}}" method="post">
            @csrf
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Full name">
                <br>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Email">
                <br>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
                <input type="phone" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Phone">


            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Password">
                <br>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="input-group col-sm-11 mb-3" style="margin: auto;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <input type="password" class="form-control @error('re_password') is-invalid @enderror" name="re_password" value="{{ old('re_password') }}" placeholder="Retype password">
                <br>
                @error('re_password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

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