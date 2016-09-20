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
		<div class="form-group label-floating">
		{{ Form::Label('name','Name User', array('class' => 'control-label')) }}
		{{ Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('name') }}
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
@stop