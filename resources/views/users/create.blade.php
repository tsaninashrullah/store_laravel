@extends('layouts.app')

@section('content')
<title>Add Games</title>
<div class="content">
	<h2>Add Games</h2>
</div>
{{ Form::open(array('url' => 'users', 'files' => true)) }}
<div class="container-fluid">
<div class="row">
	<div class="col lg-12">
		<div class="form-group label-floating">
		{{ Form::Label('name','Name Role', array('class' => 'control-label')) }}
		{{ Form::text('name', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('name') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-6">
		<div class="form-group label-floating">
		{{ Form::Label('slug','Slug Role', array('class' => 'control-label')) }}
		{{ Form::text('slug', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('slug') }}
		</div>
	</div>
</div>
<br>
<br>
<div class="col lg-12">
	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
</div>
</div>
{{ Form::close() }}
@stop