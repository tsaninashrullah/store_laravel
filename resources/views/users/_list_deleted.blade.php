@extends('layouts.app')

@section('content')
<?php
use App\Models\Users;
?>
<div class="row">
</div>

<div class="container-fluid">
	<div class="page-header">
		<h1>List User<small> Deleted</small></h1>
	</div>
	<div class="col lg-12">
		<div class="table-responsive">
		@if(count($users) == 0)
			<br>
			<br>
			<h4 align="center">Sorry user not yet deleted at all, come on {{ link_to('users', 'Back', array('class' => 'btn btn-raised btn-primary')) }}!!!</h4>
		@else
		<br>
		<br>
		<table class="table table-hover">
			<tr>
				<th><center>Username</center></th>
				<th><center>First Name</center></th>
				<th><center>Last Name</center></th>
				<th><center>Email</center></th>
				<th><center>Restore</center></th>
			</tr>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->username }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						{{ Form::open(array('url' => array('users/restore/' . $user->id))) }}
						{{ Form::submit('Restore',array('class' => 'btn btn-info')) }}
						{{  Form::close() }}
					</td>
				</tr>
			@endforeach
		@endif
		</table>
		</div>
		<!-- <img src="uploads/images/1/1.jpg" width="40%"> -->
	</div>
</div>
@stop