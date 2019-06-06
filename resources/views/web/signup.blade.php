@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/signup.jpg);">

</div>

<form class="login100-form validate-form" method="post" action="{{url('register')}}">
					{{ csrf_field() }}

					<div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
						<input class="input100" type="text" name="fullname" placeholder=" Full Name ">
						<span class="focus-input100" style="color: red">{{ $errors->first('fullname') }}</span>
					</div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <input class="input100" type="email" name="email" placeholder="Email">
            <span class="focus-input100" style="color: red">{{ $errors->first('email') }}</span>
          </div>

					<div class="wrap-input100 validate-input m-b-26">
						<select name="company_id" style="border: 0; color: #c5c8cc; padding: 10px 0" class="input100">
						<option disabled selected>Company Name</option>
						@foreach ($companies as $company)
							<option value = "{{ $company->id }}">{{ $company->name }}</option>
						@endforeach
						</select>
						<span class="focus-input100" style="color: red">{{ $errors->first('company') }}</span>
					</div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
            <input class="input100" type="text" name="phone" placeholder="Phone Number">
            <span class="focus-input100" style="color: red">{{ $errors->first('phone') }}</span>
          </div>
					<div class="wrap-input100 validate-input m-b-26">
						<select name="permit" style="border: 0; color: #c5c8cc; padding: 10px 0" class="input100">
							<option disabled selected>Work Permit</option>
							<option value="nationality" >Nationality</option>
							<option value="singaporean">Singaporean</option>
							<option value="pr">PR</option>
							
						</select>
						<span class="focus-input100" style="color: red">{{ $errors->first('permit') }}</span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder=" Password">
						<span class="focus-input100" style="color: red">{{ $errors->first('password') }}</span>
					</div>


          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
            <span class="focus-input100" style="color: red">{{ $errors->first('password_confirmation') }}</span>
          </div>

					
          <div class="container-login100-form-btn" >
						<button class="login100-form-btn" align="center">
							Proceed
						</button>

					</div>
				</form>
@endsection
