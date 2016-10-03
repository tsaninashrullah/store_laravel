@extends('layouts.app')
@section('content')
<div class="page-header">
  <h1>Change <small>Password</small></h1>
</div>
{{ Form::open(['url' => 'change-password-store/'.$forgot_token]) }}
<div class="well">
  <div class="row">
    <div class="col-lg-12">
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

      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="form-group label-floating">
          {{ Form::Label('password_confirmation','Re-Type Password', array('class' => 'control-label')) }}
          {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
          {{ $errors->first('password') }}
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-lg-offset-2"> {{ Form::submit('Change Password', array('class' => 'btn btn-raised btn-info')) }}</div>
    </div>
  </div>
</div>

{{ Form::close() }}
@include('shared.slider')
@stop