@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

</div>

<form class="login100-form validate-form" action="{{url('index')}}">


					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Current Password">
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="Conpassword" placeholder="New Password">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="Conpassword" placeholder="Confirm Password">
            <span class="focus-input100"></span>
          </div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">


						</div>

					</div>

          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Update
						</button>

					</div>
				</form>
@endsection
