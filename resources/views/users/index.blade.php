@extends('layouts.app')

@section('content')
<?php
use App\Models\Users;
?>
<div class="row">
	<div class="col lg-12">
		<header><h1 align="Center"> List Data User</h1></header>
	</div>
</div>

<div class="container-fluid">
	<div class="col lg-12">
		<div class="table-responsive">
		@if(count($users) == 0)
			<br>
			<br>
			<h4 align="center">Sorry data not yet available, You can {{ link_to('users/create', 'Create', array('class' => 'btn btn-raised btn-primary')) }} the data</h4>
		@else
		<br>
		<br>
		<table class="table table-hover">
			<tr>
				<th width="5%"><center>Aktivasi</center></th>
				<th><center>Username</center></th>
				<th><center>First Name</center></th>
				<th><center>Last Name</center></th>
				<th><center>Email</center></th>
				<th colspan="2"><center>Action</center></th>
			</tr>
			@foreach ($users as $user)
			<?php $activation = Users::find($user->id)->activation; ?>
				<tr>
				@if($activation['completed'] == 1)				
					<td width="5%">
					<i class="btn btn-primary btn-fab-mini">
						{{ Form::open(array('route' => array('users.deactive', $user->id), 'method' => 'post')) }}
						{{ Form::submit('not_interested',array('class' => 'material-icons', "onclick" => "return confirm('Anda akan non-aktifkan user $user->first_name $user->last_name ?')")) }}
						{{  Form::close() }}
					</i>
					</td>
				@else
					<td width="5%">
					<i class="btn btn-primary btn-fab-mini">
						{{ Form::open(array('route' => array('users.active', $user->id), 'method' => 'post')) }}
						{{ Form::submit('assignment_ind',array('class' => 'material-icons', "onclick" => "return confirm('Anda akan aktifkan user $user->first_name $user->last_name ?')")) }}
						{{  Form::close() }}
					</i>
					</td>
				@endif
					<td>{{ $user->username }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td>
					<i class="btn btn-success btn-fab-mini">
						{{ link_to('user/'.$user->id, 'visibility', array('class' => 'material-icons')) }}
					</i>
					</td>
					<td>
					<i class="btn btn-danger btn-fab-mini">
						{{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
						{{ Form::submit('warning',array('class' => 'material-icons', "onclick" => "return confirm('Are you sure?')")) }}
						{{  Form::close() }}
					</i>
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