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
        <div class="col-lg-10">
        &nbsp;
        </div>
        <div class="col-lg-2 pull-right">
            <div class="btn-group">
              <a href="javascript:void(0)" class="btn btn-info">Excel</a>
              <a href="bootstrap-elements.html" data-target="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Import</a></li>
                <li class="divider"></li>
                <li><a href="/export_comments/{{$games->id}}">Export</a></li>
              </ul>
            </div>
        <!-- MODAL -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select Your excel to Import your data</h4>
              </div>
              {{ Form::open(array('url' => 'import_comments/' . $games->id, 'files' => true)) }}
              <div class="modal-body">
                <p>{{ Form::file('comments') }}</p>
              </div>

              <div class="modal-footer">
              {{ Form::submit('Import', array('class' => 'btn btn-primary')) }}
              </div>
              {{ Form::close() }}
            </div>

          </div>
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
        {{ Form::close() }}
            @if(count($games->comments) == 0)
                <h3><strong><center>Not Comment Yet</center></strong></h3>
            @else
            @if(Sentinel::inRole('admin'))
            <div class="pull-right">
                {{ Form::open(array('route' => array('comments.destroy', $games->id), 'method' => 'delete')) }}
                {{ Form::submit('Delete All Comments',array('class' => 'btn btn-warning', "onclick" => "return confirm('Are you sure?')")) }}
                {{  Form::close() }}
            </div>
            @endif
            @foreach($comments_user as $game)
            <div class='row'>
                <div class='col-lg-12'>
                    <p>From : <strong><?php $i=0; ?> {{ $games->users[$i]->email }} <?php $i++; ?></strong></p>
                </div>
                <div class='col-lg-12'>
                    <p>{{$game->comments}}</p>
                </div>
            </div>
            <hr>
            @endforeach
            @endif
        </div>
    </div>
    <hr>
</div>
@include('shared.slider')
@stop
