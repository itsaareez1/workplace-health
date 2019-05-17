@extends('layouts.layoutsign')



@section('content')


			<div class="login100-form-title" style="background-image: url(web/login/images/login.jpg);">
			
			</div>

			<form class="login100-form validate-form" method="POST" action="{{url('signin')}}">

			{{ csrf_field() }}
				<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
					<span class="label-input100">Username</span>
					<input class="input100" type="text" name="username" placeholder="Enter username">
					<span class="focus-input100" style="color: red">{{ $errors->first('username') }}</span>
				</div>

				<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Enter password">
					<span class="focus-input100" style="color: red">{{ $errors->first('password') }}</span>
				</div>

				<div class="flex-sb-m w-full p-b-30">
					<div class="contact100-form-checkbox">
					<!--	<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" value="remember">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label> -->
					</div>

					<div>
						<a href="{{url('forgetpassword')}}" class="txt1">
							Forgot Password?
						</a>
					</div>
				</div>
				<div>
					@if (session('status'))
	 					<span style="color: red;">{{ session('status') }}</span><br/><br/><br/>
			    	@endif
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" align='center'>
						Login
					</button>

					<div class="flex-col-c p-t-155">
						<p>Not a member? <a href="{{url('signup')}}" class="blue-text txt2">Sign Up</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


		@endsection
