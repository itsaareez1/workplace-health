@extends('layouts.layoutsign')



@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/signup.jpg);">

</div>

<form class="login100-form validate-form" action="{{url('index')}}">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
						<input class="input100" type="text" name="name" placeholder=" Full Name ">
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
            <input class="input100" type="email" name="email" placeholder="Email">
            <span class="focus-input100"></span>
          </div>

					<div class="wrap-input100 validate-input m-b-26">
						<select style="border: 0; color: #c5c8cc; padding: 10px 0" class="input100">
							<option disabled selected>Company Name</option>
						</select>
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Phone is required">
            <input class="input100" type="text" name="phone" placeholder="Phone Number">
            <span class="focus-input100"></span>
          </div>
					<div class="wrap-input100 validate-input m-b-26">
						<select style="border: 0; color: #c5c8cc; padding: 10px 0" class="input100">
							<option disabled selected>Nationality</option>
							<option disabled selected>Singaporean</option>
							<option disabled selected>PR</option>
							<option disabled selected>Work Permit</option>
							
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder=" Password">
						<span class="focus-input100"></span>
					</div>


          <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="Conpassword" placeholder="Confirm Password">
            <span class="focus-input100"></span>
          </div>

					<div class="flex-sb-m w-full p-b-30">

						<div class="container-login100-form-btn" legal>
								<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
								<label  style="font-size: 12px;  font-weight: 600; color: #555;">&nbsp; I agree all statements in <a style="color: blue;" href="https://drive.google.com/open?id=1D9gef-oIJyZlXKTh3kzANZbRch_nEem6 fT_8tYpHwagTOzrj9CB-0IrbOy18" class="term-service">Terms of service</a>.</label>
						</div>

					</div>

          <div class="container-login100-form-btn" >
						<button class="login100-form-btn" align="center">
							sign up
						</button>

					</div>
				</form>
@endsection
