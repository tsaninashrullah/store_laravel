@extends('layouts.app')

@section('content')
<title>Register User</title>
<div class="content">
	<h2 align="center">Login User</h2>
</div>
{{ Form::open(array('url' => 'auth', 'files' => true)) }}
<div class="col-lg-8 col-lg-offset-2">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title" align="center">Login</h3>
  </div>
  <div class="panel-body">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="form-group label-floating">
			{{ Form::Label('email','Email', array('class' => 'control-label')) }}
			{{ Form::text('username', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('email') }}
			</div>
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="form-group label-floating">
			{{ Form::Label('password','Password', array('class' => 'control-label')) }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			{{ $errors->first('password') }}
			</div>
		</div>
	</div>
	<br>
	<div class="col-lg-4 col-lg-offset-2">
		{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
	</div>
	<a href="f_restore">Forgot Password?</a>
  </div>
</div>
</div>
{{ Form::close() }}
@include('shared.slider')
@stop