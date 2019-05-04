<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="shortcut icon" href="{{asset('admin/img/favicon.png')}}">
  <title>Sign In / Universe Admin</title>

  
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


  <div class="navbar navbar-light navbar-expand-lg p-front__navbar"> <!-- is-dark -->
  <a class="navbar-brand" href="/"><img src="{{asset('admin/img/logo.png')}}" alt=""/></a>
  <a class="navbar-brand-sm" href="/"><img src="{{asset('admin/img/logo-sm.png')}}" alt=""/></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse">
    <span class="ua-icon-navbar-open navbar-toggler__open"></span>
    <span class="ua-icon-alert-close navbar-toggler__close"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar-collapse">
    <div class="p-front__navbar-collapse">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">About</a>
        <a class="nav-item nav-link" href="#">Features</a>
        <a class="nav-item nav-link" href="#">Pricing</a>
      </div>
      <form class="form-inline">
        <a class="btn btn-info btn-rounded" href="#">Sign Up</a>
      </form>
    </div>
  </div>
</div>




<div class="p-front__content">
  
<div class="p-signin">
  <form class="p-signin__form">
    <h2 class="p-signin__form-heading">Login to our app</h2>
    <div class="p-signin__form-content">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="p-signin-work-email">Work Email</label>
          <input type="email" class="form-control" id="p-signin-work-email" placeholder="you@yourcompany.com">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="p-signin-set-password">Password</label>
          <input type="email" class="form-control" id="p-signin-set-password" placeholder="Password">
        </div>
      </div>
      <div>
        <button type="button" class="btn btn-info btn-block btn-lg p-signin__form-submit">Get Started!</button>
      </div>
      <div class="p-signin__form-links">
        <div class="p-signin__form-link">
          Don't have an account? <a href="signup.html" class="link-info">Sign Up</a>
        </div>
      </div>
    </div>
  </form>
</div>

</div>



<footer class="p-front__footer">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link active" href="#">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">FAQ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Terms of Service</a>
    </li>
  </ul>
  <span>2017 &copy; UniverseAdmin</span>
</footer>



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