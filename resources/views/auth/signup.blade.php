@extends('layouts.app')

@section('content')
<title>Register User</title>
<div class="content">
	<h2 align="center">Register User</h2>
</div>
{{ Form::open(array('url' => 'register', 'files' => true)) }}
<div class="container-fluid">
<div class="col-lg-8 col-lg-offset-2">
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group label-floating">
			{{ Form::Label('first_name','First Name', array('class' => 'control-label')) }}
			{{ Form::text('first_name', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('first_name') }}
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group label-floating">
			{{ Form::Label('last_name','Last Name', array('class' => 'control-label')) }}
			{{ Form::text('last_name', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('last_name') }}
			</div>
		</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="form-group label-floating">
		{{ Form::Label('username','Username', array('class' => 'control-label')) }}
		{{ Form::text('username', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('username') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<div class="form-group label-floating">
		{{ Form::Label('email','Email', array('class' => 'control-label')) }}
		{{ Form::email('email', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('email') }}
		</div>
	</div>
</div>
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
</div>
</div>
{{ Form::close() }}
@include('shared.slider')
@stop