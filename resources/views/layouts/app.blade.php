<?php
use Cartalyst\Sentinel\Users\UserInterface;
?>
<!DOCTYPE html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
<link type="text/css" href="/assets/library/bootstrap/css/bootstrap.css" rel="stylesheet">
<link type="text/css" href="/assets/library/material/css/bootstrap-material-design.css" rel="stylesheet">
<link type="text/css" href="/assets/library/material/css/ripples.css" rel="stylesheet">


<head>
    <title></title>
</head>
    <body>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous">
    </script>
    <!-- <script type="text/javascript" src="/assets/library/jquery/jquery-1-11-1.js"></script> -->
    <script type="text/javascript" src="/assets/library/material/js/material.js"></script>
    <script type="text/javascript" src="/assets/library/material/js/ripples.js"></script>
    <script type="text/javascript" src="/assets/library/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/assets/library/bootstrap/js/jquery.countdown.min.js"></script>

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
</html>