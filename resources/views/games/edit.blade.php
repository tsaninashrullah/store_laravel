@extends('layouts.app')

@section('content')
<title>Add Games</title>
<div class="content">
	<h2>Add Games</h2>
</div>
{{ Form::model($game, ['route' => array('games.update', $game->id), 'method' => 'PUT', 'files' => true]) }}
<!-- {{ Form::open(array('url' => 'games', 'files' => true)) }} -->
<div class="container-fluid">
<div class="row">
	<div class="col lg-12">
		<div class="form-group label-floating">
		{{ Form::Label('title','Title Games', array('class' => 'control-label')) }}
		{{ Form::text('title', $value = $game->title, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('title') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-6">
		<div class="form-group label-floating">
		{{ Form::Label('author','Author', array('class' => 'control-label')) }}
		{{ Form::text('author', $value = $game->author, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('author') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-6">
		<div class="form-group label-floating">
		{{ Form::Label('email','Email', array('class' => 'control-label')) }}
		{{ Form::email('email', $value = $game->email, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('email') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-12">
		<div class="form-group label-floating">
		{{ Form::Label('description','Description', array('class' => 'control-label')) }}
		{{ Form::textarea('description', $value = $game->description, $attributes = array('required', 'class' => 'form-control')) }}
		{{ $errors->first('description') }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col lg-12">
		{{ Form::Label('image','Image') }}
		<h4>Image Before</h4>
		<img src="{{ asset('upload-image/' . $game->image)  }}" style="max-height:200px;max-width:200px;margin-top:10px;">
		{{ Form::file('image') }}
		<!-- {{ $errors->first('description') }} -->
	</div>
</div>
<br>
<br>
<br>
<div class="col lg-12">
	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
</div>
</div>
{{ Form::close() }}
@include('shared.slider')
@stop