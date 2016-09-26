@extends('layouts.app')
@section('content')
<style type="text/css">
    .right {
        position: absolute;
        right: 0px;
    }
</style>
<div class="container-fluid">
<br>
    @if(Sentinel::inRole('admin'))
    <div class="row">
        <div class="col-lg-12 pull-right">
            {{ link_to('export_comments/' . $games->id, $title = 'Export', $attributes = array('class' => 'btn btn-primary'), $secure = null) }}
        </div>
    </div>
    @endif
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
        <div class="col-md-7">
        {{ Form::open(['action' => ['CommentsController@store', $games->id]]) }}
        	<div class="form-group label-floating">
			{{ Form::Label('comments','Comments', array('class' => 'control-label')) }}
			{{ Form::textarea('comments', $value = null, $attributes = array('required', 'class' => 'form-control')) }}
			{{ $errors->first('comments') }}
			</div>
			{{ Form::submit('Send', array('class' => 'btn btn-primary')) }}
            <hr>
            <h2><strong>Comment About {{$games->title}} </strong></h2>
            <hr>
            @if(count($games->comments) == 0)
                <h3><strong><center>Not Comment Yet</center></strong></h3>
            @else
            <?php
            $count = count($games->users);
            for($i=0; $i < $count; $i++){
            echo "<div class='row'>
                <div class='col-lg-12'>
                    <p>From : <strong>";
                    echo $games->users[$i]->email;
                    echo "</strong></p>
                </div>
                <div class='col-lg-12'>
                    <p>";
                    echo $games->comments[$i]->comments;
                    echo "</p>
                </div>
            </div>
            <hr>";
            }
            ?>
            @endif
        </div>
        {{ Form::close() }}
    </div>
    <hr>
</div>
@include('shared.slider')
@stop
