@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

</div>

<form class="login100-form validate-form" action="{{url('editProfile')}}">


          <div class="wrap-input100 validate-input m-b-18" data-validate = "OTP is required">
            <h2>Enter OTP sent to 987654321</h2>
            <input class="input100" type="text" name="OTP" placeholder="Enter OTP">
            <span class="focus-input100"></span>
          </div>
          <div>
            <a href="#" class="txt1">
              <h2 align="center">RESEND OTP</h2>
            </a>
          </div>

          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Continue
						</button>

					</div>
				</form>
@endsection
