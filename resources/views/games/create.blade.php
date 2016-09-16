@extends('layouts.app')

@section('content')
<title>Add Games</title>
<div class="content">
	<h2>Add Games</h2>
</div>
<br>
<br>
<br>
{{ Form::open(array('url' => 'games')) }}
<div class="container-fluid">
<div class="row">
	<div class="col lg-12">
		{{ Form::Label('title','Title Games') }}
		{{ Form::text('title', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('title') }}
	</div>
</div>
<div class="row">
	<div class="col lg-6">
		{{ Form::Label('author','Author') }}
		{{ Form::text('author', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('author') }}
	</div>
</div>
<div class="row">
	<div class="col lg-6">
		<div class="form-group label-floating">
		{{ Form::Label('email','Email', array('class' => 'control-label')) }}
		{{ Form::email('email', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('email') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-12">
		{{ Form::Label('description','Description') }}
		{{ Form::textarea('description', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('description') }}
	</div>
</div>
<div class="col lg-12">
	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
</div>
</div>
{{ Form::close() }}
@stop