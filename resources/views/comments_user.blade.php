@extends('layouts.app')

@section('content')
<div class="container-fluid">
<br>
    <div class="row">
        <div class="col-md-5">
        <div class="panel panel-primary">
        	<div class="panel-heading">
        		<div class="Panel-title"><h2>{{ $games->title }}</h2></div>
        	</div>
        	<div class="panel-body">
        		<img src="{{ asset('uploads/images/' . $games->id . '/' . $games->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;">
        		<br>
        		<h4>Author : <strong>{{ $games->author }}</strong></h4>
        		<br>
        		<p>Description :</p>
        		<br>
        		<p>{{ $games->description }}</p>
        	</div>
        </div>
        </div>
        {{ Form::open(['action' => ['CommentsController@store', $games->id]]) }}
        <div class="col-md-7">
        	<div class="form-group label-floating">
			{{ Form::Label('comments','Comments', array('class' => 'control-label')) }}
			{{ Form::textarea('comments', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('comments') }}
			</div>
			{{ Form::submit('Send', array('class' => 'btn btn-primary')) }}
        </div>
        {{ Form::close() }}
    </div>
    <hr>
    <div class="row">
    	<div class="col-lg-12">
    		@if($comments == 0)
    		<h1 align="center">No comments yet</h1>
    		@else
    		<div class="row">
    			<div class="col-lg-12">
    				<p>{{ $users->username }}</p>
    			</div>
    			<div class="col-lg-12">
    				<p>{{ $comments->comments }}</p>
    			</div>
    		</div>
    		<hr>
    		@endif
    	</div>
    </div>
</div>
@endsection
