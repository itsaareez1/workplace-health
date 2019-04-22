@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

</div>

<form class="login100-form validate-form" action="{{url('verifyPass')}}">


					<div class="wrap-input100 validate-input m-b-18" data-validate = "required">
						<input class="input100" type="password" name="pass" placeholder=" Email / Phone Number">
						<span class="focus-input100"></span>
					</div>


          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							continue
						</button>
					</div>
				</form>
@endsection
