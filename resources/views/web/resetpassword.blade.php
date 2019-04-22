@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">
  
</div>

<form class="login100-form validate-form" action="{{url('login')}}">


          <div class="wrap-input100 validate-input m-b-18" data-validate = "New Password is required">
            <input class="input100" type="password" name="Newpassword" placeholder="New Password">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="Conpassword" placeholder="Confirm Password">
            <span class="focus-input100"></span>
          </div>




          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Continue
						</button>

					</div>
				</form>
@endsection
