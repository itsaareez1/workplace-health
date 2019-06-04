@extends('layouts.layoutindex')
@section('content2')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">

				<form class="login100-form validate-form" method="POST" action="{{ url('upPro') }}">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="{{asset('/web/profile/images/avatar-01.jpg')}}" alt="AVATAR">
					</span>
<br/><br/>

@if (session()->has('status'))
          <div class="row" style="color:green">
          <div class="col-lg-12">
          <div class="alert action-alert action-alert--danger has-btn" role="alert">
              <span class="action-alert__message">
              <span class="action-alert__action-message">{{ session()->get('status') }}</a>
            </span>
          </div>
         </div>
         </div>
         @endif
					<div class="wrap-input100 validate-input m-b-26">
						<select name="gender" style="border: 0; color: #c5c8cc; padding: 10px 0" class="input100">
						@if ($user->salutation != "Ms." && $user->salutation != "Mr.")
						<option disabled selected>Select Salutation</option>
						<option value="Mr.">Mr.</option>
						<option value="Ms.">Ms.</option>
						@elseif ($user->salutation == "Ms.")
						<option disabled selected value = "{{ $user->salutation }}">{{ $user->salutation }}</option>
						<option value = "Mr.">Mr.</option>
						@elseif ($user->salutation == "Mr.")
						<option disabled selected value = "{{ $user->salutation }}">{{ $user->salutation }}</option>
						<option value = "Ms.">Ms.</option>
						@endif
						</select><br/>
						<span class="focus-input100" style="color: red">{{ $errors->first('company') }}</span>
					</div>
					<div class="wrap-input100 validate-input m-b-50" data-validate = "">
						<input class="input100" type="text" name="name" value="{{ $user->name }}">
						<span class="focus-input100" data-placeholder=""  dir="rtl" align="right"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="">
						<input class="input100" type="text" name="phone" value="{{ $user->phone }}">
						<span dir="rtl" align="right" class="focus-input100" data-placeholder=""></span>
            <p dir="rtl" align="right" ><a href="{{url('verifyAccount1')}}" class="txt2">Verify Phone Number</a></p>
					</div>

          <div class="wrap-input100 validate-input m-b-50" data-validate="">
						<input class="input100" type="email" name="email" value="{{ $user->email }}"><a href="#" class="txt2">
						<span class="focus-input100" data-placeholder=""  dir="rtl" align="right"></span>
          <p dir="rtl" align="right"><a href="{{url('verifyAccount2')}}" class="txt2"><p dir="rtl" align="right">Verify Email</a></p>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Save Change">
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>




	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('/web/profile/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('/web/profile/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('/web/profile/js/main.js')}}"></script>
@endsection