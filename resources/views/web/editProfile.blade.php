@extends('layouts.layoutindex')
@section('content2')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="{{url('index')}}">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="{{asset('/web/profile/images/avatar-01.jpg')}}" alt="AVATAR">
					</span>


          <div class="wrap-input100 validate-input m-t-85 m-b-35">
              <div class="input-group">
                  <label class="input100">Gender</label>
                  <div class="p-t-10">
                      <label class="radio-container m-r-45">Mr
                          <input type="radio" checked="checked" name="gender">
                          <span class="checkmark"></span>
                      </label>
                      <label class="radio-container">Ms
                          <input type="radio" name="gender">
                          <span class="checkmark"></span>
                      </label>
                  </div>
              </div>
          </div>

					<div class="wrap-input100 validate-input m-b-50" data-validate = "Name">
						<input class="input100" type="text" name="Name">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Mobile Number">
						<input class="input100" type="text" name="number">
						<span class="focus-input100" data-placeholder="Mobile Number"></span>
            <p dir="rtl" align="right" ><a href="{{url('verifyAccount1')}}" class="txt2">Verify Number</a></p>
					</div>

          <div class="wrap-input100 validate-input m-b-50" data-validate="Email Address">
						<input class="input100" type="email" name="email"><a href="#" class="txt2">
						<span class="focus-input100" data-placeholder="Email Address"></span>
          <p dir="rtl" align="right"><a href="{{url('verifyAccount2')}}" class="txt2"><p dir="rtl" align="right">Verify Email</a></p>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							save change
						</button>
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