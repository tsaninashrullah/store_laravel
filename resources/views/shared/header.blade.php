<?php
$value = Sentinel::getUser();
$user = Sentinel::findUserById($value);
?>

@if ($user = Sentinel::check())
<div class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:void(0)">TRSNW. </a>
    </div>
    <div class="navbar-collapse collapse navbar-warning-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>{{ link_to('/', 'Home') }}</li>
        <li>
        @foreach(getGames() as $key => $value)
        {{$value->first_name}}
        @endforeach
        </li>
        <li>{{user_info()->last_name}} Bwah Bwah</li>
        @if(Sentinel::inRole('admin'))
        <li>{{ link_to('games', 'Game') }}</li>
        <li>{{ link_to('users', 'User') }}</li>
        @endif
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Sentinel::getUser()->username }}  <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
</div>
@else
<div class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-warning-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="javascript:void(0)">Mahkota Store</a>
    </div>
    <div class="navbar-collapse collapse navbar-warning-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>{{ link_to('/', 'Home') }}</li>
        <li>{{ link_to('login', 'Login') }}</li>
        <li>{{ link_to('signup', 'SignUp') }}</li>
      </ul>
    </div>
  </div>
</div>
@endif