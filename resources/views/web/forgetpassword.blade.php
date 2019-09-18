@extends('layouts.layoutsign')



@section('content')
    <div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

    </div>

    @if (session()->has('status'))
        <div class="row" style="color:green">
            <div class="col-lg-12">
                <div class="alert action-alert action-alert--danger alert-success has-btn" role="alert">
                                  <span class="action-alert__message">
                                    <span class="action-alert__action-message">{{ session()->get('status') }}</span>
                                </span>
                </div>
            </div>
        </div>
    @endif


    @if (session()->has('error'))
        <div class="row" style="color:green">
            <div class="col-lg-12">
                <div class="alert action-alert action-alert--danger alert-danger has-btn" role="alert">
                                  <span class="action-alert__message">
                                    <span class="action-alert__action-message">{{ session()->get('error') }}</span>
                                </span>
                </div>
            </div>
        </div>
    @endif

    <form class="login100-form validate-form" action="{{url('verifyPass')}}" method="get">


        <div class="wrap-input100 validate-input m-b-18" data-validate="required">

            {{--<input class="input100" type="text" value="" name="pass" placeholder=" Email / Phone Number">--}}
            <input class="input100" type="email" value="" name="email" placeholder=" Email ">
            <span class="focus-input100"></span>
        </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                continue
            </button>
        </div>
    </form>
@endsection
