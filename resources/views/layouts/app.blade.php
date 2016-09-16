<!DOCTYPE html>
<html>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
<link type="text/css" href="/assets/library/bootstrap/css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="/assets/library/material/css/bootstrap-material-design.css" rel="stylesheet">
<link type="text/css" href="/assets/library/material/css/ripples.css" rel="stylesheet">
<script src="js/jquery-1-11-1.js"></script>

<head>
	<title></title>
</head>
	<body>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<!-- <script type="text/javascript" src="/assets/library/jquery/jquery-1-11-1.js"></script> -->
	<script type="text/javascript" src="/assets/library/material/js/material.js"></script>
	<script type="text/javascript" src="/assets/library/material/js/ripples.js"></script>
	<script type="text/javascript" src="/assets/library/bootstrap/js/bootstrap.js"></script>

	<!-- Navbar HERE!!!! -->
	@include("shared.header")

	<!-- ALERT -->
	@if (Session::has('error'))
	    <div class="session-flash danger">
	        <h3 align="center">{{Session::get('error')}}</h3>
	    </div>
	@endif

	@if (Session::has('notice'))
	    <div class="session-flash success">
	        <h3 align="center">{{Session::get('notice')}}</h3>
	    </div>
	@endif

	<!-- Content HERE!!!! -->
	<div class="container">
		@yield('content')
	</div>


	<!-- Footer HERE!!!! -->
	@include("shared.footer")

	</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
    <script>
      $(function () {
        $.material.init();
        $(".shor").noUiSlider({
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });

        $(".svert").noUiSlider({
          orientation: "vertical",
          start: 40,
          connect: "lower",
          range: {
            min: 0,
            max: 100
          }
        });
      });
    </script>
</html>