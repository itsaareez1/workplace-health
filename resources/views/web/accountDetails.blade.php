@extends('layouts.layoutsign')
@section('content')
<div class="login100-form-title" style="background-image: url(web/login/images/pass.jpg);">

</div>

<form class="login100-form validate-form" action="{{url('index')}}">
	<strong><h1 align="center">Account Details</h1></strong><br><br>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Account Details is required">
						<input class="input100" type="text" name="AccountDetails" placeholder=" Account Details ">
						<span class="focus-input100"></span>
					</div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="Account Number is required">
            <input class="input100" type="text" name="AccountNumber" placeholder="Account Number">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-26" data-validate="AccountHolder is required">
            <input class="input100" type="text" name="AccountHolder" placeholder="Account Holder Name">
            <span class="focus-input100"></span>
          </div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "IFSC Code is required">
						<input class="input100" type="text" name="code" placeholder="IFSC Code">
						<span class="focus-input100"></span>
					</div>


          <div class="wrap-input100 validate-input m-b-18" data-validate = "Select Bank is required">
            <input class="input100" type="text" name="bank" placeholder="Select Bank">
            <span class="focus-input100"></span>
          </div>



          <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Confirm
						</button>

					</div>
				</form>
@endsection
