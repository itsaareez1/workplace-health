@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

</div>

<form class="login100-form validate-form" method="POST" action="{{url('changepass')}}">

				<div>
					@if (session('status'))
	 					<span style="color: green;">{{ session('status') }}. <a class="btn btn-primary" href="{{ url('index') }}">Go back to dashboard.</a></span><br/><br/><br/>
			    	@endif
						@if (session('wrong'))
	 					<span style="color: red;">{!! session('wrong') !!}. <a class="btn btn-primary" href="{{ url('index') }}">Go back to dashboard.</a></span><br/><br/><br/>
			    	@endif
				</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" type="password" name="opass" placeholder="Current Password">
						<span class="focus-input100" style="color: red">{{ $errors->first('opass') }}</span>
					</div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="npass" placeholder="New Password">
						<span class="focus-input100" style="color: red">{{ $errors->first('npass') }}</span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="cpass" placeholder="Confirm Password">
						<span class="focus-input100" style="color: red">{{ $errors->first('cpass') }}</span>
          </div>


          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Update
						</button>

					</div>
				</form>
@endsection
