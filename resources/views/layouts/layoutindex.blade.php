<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/web/images/ccc.jpg')}}" width="16" height="16"/>

    <title>WORKPLACE HEALTH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

    <link rel="stylesheet" href="{{asset('/web/datepickk/dist/datepickk.min.css')}}">
    <script src="{{asset('/web/datepickk/dist/datepickk.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/web/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/web/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('/web/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('/web/profile/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/web/profile/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/web/profile/css/mainn.css')}}">

    <style>
        footer.site-footer {
            background-color: #4170ae;
            font-weight: bold;
            letter-spacing: 5px;
        }

        /* Style the tab */
        .tab {
            width: 70%;
            text-align: center;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            margin-left: auto;
            margin-right: auto;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            text-align: center;
            float: center;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 152px;
            transition: 0.3s;
            font-size: 22px;

        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;

        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;

        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 15px;
            border: 1px solid #ccc;
            border-top: none;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        function JSalert() {
            swal({
                title: "success",
                text: "You loyalty points have been sucessfully Redeemed",
                icon: "success",
            });
        }

        function JSalert1() {
            swal({
                title: "",
                text: "Are you sure you want to cancel the Class?",
                icon: "warning",
                buttons: ["No", "Yes"],
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Your request has been sent to the admin!", {
                            icon: "success",
                            button: "Ok, GOT IT!",
                        });
                    } else {
                        swal("Your reserve class is safe!");
                    }
                });
        }
    </script>


</head>


<body style="background-image: url('web/images/bg.jpg');">
<div class="site-wrap">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar-wrap js-site-navbar bg-white">
        <div class="container">
            <div class="site-navbar bg-light">
                <div class="py-1">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img style="width:100%" src="{{url('web/images/logo.png')}}">


                        </div>

                        <div class="col-10" class="site-wrap">
                            <nav class="site-navigation text-right" role="navigation">
                                <div class="container">
                                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
                                                                                                  class="site-menu-toggle js-menu-toggle text-black"><span
                                                    class="icon-menu h3"></span></a></div>

                                    @if (session()->has('usr_id'))
                                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                                            <li><a href="{{url('welcome')}}">Home</a></li>
                                            <li><a href="{{url('program')}}">Sparkshealth programme</a></li>
                                            <li><a href="{{url('store')}}">Store</a></li>
                                            {{--<li><a href="{{url('gift-store')}}">Gift Store</a></li>--}}
                                            <li><a href="{{url('loyalty')}}">Loyalty Programme</a></li>
                                            <li><a href="{{url('help')}}"> FAQs</a></li>
                                            <li><a href="{{url('contact')}}">Contact</a></li>
                                            <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            <li class="has-children"><a href="#"><i class="fa fa-user"></i>
                                                    Welcome, {{ session('name') }} &nbsp;&nbsp;</a>
                                                <ul class="dropdown arrow-top">
                                                    {{--<li><a href="{{url('dashboard')}}"><i class="fa fa-home"></i>--}}
                                                    {{--Dashboard</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li><a href="{{url('my-qrcode')}}"><i class="fa fa-eye"></i> QR-code</a>--}}
                                                    {{--</li>--}}
                                                    <li><a href="{{url('attendance')}}">
                                                            <i class="fa fa-camera"></i> Attendance</a>
                                                    </li>
                                                    <li><a href="{{url('attendance_calendar')}}"><i
                                                                    class="fa fa-calendar"></i> Calendar</a>
                                                    </li>
                                                    <li><a href="{{url('editProfile')}}"><i class="fa fa-user"></i> Edit
                                                            Profile</a></li>

                                                    <li><a href="{{url('myOrder')}}"><i class="fa fa-file"></i> My Order</a>
                                                    </li>
                                                    <li><a href="{{url('history')}}"><i class="fa fa-history"></i>
                                                            History</a></li>
                                                <!--                       <li><a href="{{url('buyCredits')}}"><i class="fa fa-fw fa-credit-card"></i> Buy credits</a></li> -->
                                                    <li><a href="{{url('loyaltyPoints')}}"><i
                                                                    class="fa fa-hand-point-up"></i> Loyalty Points</a>
                                                    </li>
                                                    <li><a href="{{url('changepass')}}"><i
                                                                    class="fa fa-exchange-alt"></i> Change Password</a>
                                                    </li>
                                                    <li><a href="{{url('signout')}}"><i class="fa fa-sign-out-alt"></i>
                                                            Sign Out</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="site-menu js-clone-nav d-none d-lg-block">

                                            <li><a href="{{url('welcome')}}">Home</a></li>
                                            <li><a href="{{url('program')}}">Sparkshealth programme</a></li>
                                            <li><a href="{{url('store')}}">Store</a></li>
                                            {{--<li><a href="{{url('gift-store')}}">Gift Store</a></li>--}}
                                            <li><a href="{{url('loyalty')}}">Loyalty Programme</a></li>
                                            <li><a href="{{url('help')}}"> FAQs</a></li>
                                            <li><a href="{{url('contact')}}">Contact</a></li>
                                            <li><a href="{{url('login')}}">Login</a></li>


                                        </ul>
                                    @endif
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div style="height: 113px;"></div> -->

    @yield('content2')


    <footer class="site-footer">
        <div class="container">

            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p style="color: white;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All Rights Reserved
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="{{asset('/web/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/web/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('/web/js/jquery-ui.js')}}"></script>
<script src="{{asset('/web/js/popper.min.js')}}"></script>
<script src="{{asset('/web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/web/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/web/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('/web/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('/web/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('/web/js/aos.js')}}"></script>
<script src="{{asset('/web/js/main.js')}}"></script>


<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>
