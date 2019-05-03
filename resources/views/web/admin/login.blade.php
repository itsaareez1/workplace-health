<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">
  <title>Login as Administrator</title>

  
    <link rel="stylesheet" href="{{asset('admin/fonts/open-sans/style.min.css')}}"> <!-- common font  styles  -->
<link rel="stylesheet" href="{{asset('admin/fonts/universe-admin/style.css')}}"> <!-- universeadmin icon font styles -->
<link rel="stylesheet" href="{{asset('admin/fonts/mdi/css/materialdesignicons.min.css')}}"> <!-- meterialdesignicons -->
<link rel="stylesheet" href="{{asset('admin/fonts/iconfont/style.css')}}"> <!-- DEPRECATED iconmonstr -->
<link rel="stylesheet" href="{{asset('admin/vendor/flatpickr/flatpickr.min.css')}}"> <!-- original flatpickr plugin (datepicker) styles -->
<link rel="stylesheet" href="{{asset('admin/vendor/simplebar/simplebar.css')}}"> <!-- original simplebar plugin (scrollbar) styles  -->
<link rel="stylesheet" href="{{asset('admin/vendor/tagify/tagify.css')}}"> <!-- styles for tags -->
<link rel="stylesheet" href="{{asset('admin/vendor/tippyjs/tippy.css')}}"> <!-- original tippy plugin (tooltip) styles -->
<link rel="stylesheet" href="{{asset('admin/vendor/select2/css/select2.min.css')}}"> <!-- original select2 plugin styles -->
<link rel="stylesheet" href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}"> <!-- original bootstrap styles -->
<link rel="stylesheet" href="{{asset('admin/css/style.min.css')}}" id="stylesheet"> <!-- universeadmin styles -->

  

  <script src="{{asset('admin/js/ie.assign.fix.min.js')}}"></script>
</head>
<body class="p-front">



<div class="p-front__content">

<div class="p-signin">
  <form class="p-signin__form" method="POST" action="{{url('admin-login')}}">
    <h2 class="p-signin__form-heading">Login as Administrator</h2>
    <div class="p-signin__form-content">
    @if (session()->has('status'))
    <div class="row">
      <div class="col-lg-12">
        <div class="alert action-alert action-alert--danger has-btn" role="alert">
          <span class="action-alert__message">
            <span class="action-alert__action-message">{{ session()->get('status') }}</a>
          </span>
        </div>
      </div>
    </div>
    @endif


    <div class="row">
        <div class="form-group col-md-12">
        <label for="p-signin-work-email">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <span style="color: red">{{ $errors->first('email') }}</span>
          <input type="email" class="form-control" name="email" id="p-signin-work-email" placeholder="you@yourcompany.com" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="p-signin-set-password">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;
          <span style="color: red">{{ $errors->first('password') }}</span>
          <input type="password" class="form-control" name="password" id="p-signin-set-password" placeholder="Password" required>
        </div>
      </div>
      <div>
        <button type="submit" class="btn btn-info btn-block btn-lg p-signin__form-submit">Login</button>
      </div>
      </div>
    </div>
  </form>
</div>

</div>




  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/vendor/simplebar/simplebar.js')}}"></script>
<script src="{{asset('admin/vendor/text-avatar/jquery.textavatar.js')}}"></script>
<script src="{{asset('admin/vendor/tippyjs/tippy.all.min.js')}}"></script>
<script src="{{asset('admin/vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('admin/vendor/wnumb/wNumb.js')}}"></script>
<script src="{{asset('admin/js/main.js')}}"></script>



<div class="sidebar-mobile-overlay"></div>

</body>
</html>
