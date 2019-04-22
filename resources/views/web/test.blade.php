<!DOCTYPE html>
<html>
<head>
  <title>WORKPLACE HEALTH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">

  <link rel="stylesheet" href="{{asset('/web/datepickk/dist/datepickk.min.css')}}">
  <script src="{{asset('/web/datepickk/dist/datepickk.min.js')}}"></script>


  <link rel="stylesheet" href="{{asset('/web/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('/web/css/animate.css')}}">
  <link rel="stylesheet" href="{{asset('/web/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('/web/css/style.css')}}">



</head>
<body>
<script>
	var datepicker = new Datepickk();
</script>
<button class="orange" style="margin:0 auto;" onclick="datepicker.show();">Click here for date picker</button>
<script>

function closeOnSelectDemo(){

datepicker.unselectAll();

datepicker.closeOnSelect = true;

console.log(datepicker.closeOnSelect);

datepicker.onClose = function(){

datepicker.closeOnSelect = false;

datepicker.onClose = null;

}

datepicker.show();

}

</script>
</body>
</html>
