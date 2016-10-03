@extends('layouts.app')

@section('content')
<title>Forgot</title>
<div class="content">
	<h2 align="center">Forgot Password</h2>
</div>
{{ Form::open(array('url' => 'reset', 'files' => true)) }}
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
			{{ Form::email('email', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('email') }}
			</div>
		</div>
	</div>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
 	<div class="col-lg-4 col-lg-offset-2">
		{{ Form::submit('Send', array('class' => 'btn btn-primary')) }}
	</div>
  </div>
</div>
</div>
{{ Form::close() }}
@include('shared.slider')
@stop