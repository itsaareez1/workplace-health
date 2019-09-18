@extends('layouts.layoutsign')



@section('content')
    <div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form class="login100-form validate-form" method="post" action="{{url('resetAdminPassword')}}">


        <div class="wrap-input100 validate-input m-b-18" data-validate="required">
            <input class="input100" type="email" required name="to_mail" id="to_mail" placeholder=" Enter Your Email Address">
            <span class="focus-input100"></span>
        </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Reset
            </button>
        </div>
    </form>
@endsection
