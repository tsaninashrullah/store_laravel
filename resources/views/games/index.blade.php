@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col lg-12">
		<header><h1 align="Center"> List Data Game</h1></header>
	</div>
</div>

<div class="container-fluid">
	<div class="col lg-12">
		<div class="table-responsive">
		@if(count($games) == 0)
			<br>
			<br>
			<h4 align="center">Sorry data not yet available, You can {{ link_to('games/create', 'Create', array('class' => 'btn btn-raised btn-primary')) }} the data</h4>
		@else
		{{ link_to('games/create', 'mode_edit', array('class' => 'btn-floating green materialize-icon small')) }} 
		<br>
		<br>
		<table class="table table-hover">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Email</th>
				<th>Description</th>
				<th colspan="3">Action</th>
			</tr>
			@foreach ($games as $game)
				<tr>
					<td>{{ $game->title }}</td>
					<td>{{ $game->author }}</td>
					<td>{{ $game->email }}</td>
					<td>{{ $game->description }}</td>
					<td width="10%">
						{{ link_to('games/'.$game->id, 'Show', array('class' => 'btn btn-default')) }}
					</td>
					<td width="10%">
						{{ link_to('games/'.$game->id.'/edit', 'Edit', array('class' => 'btn btn-default')) }} 
					</td>
					<td width="10%">
						{{ Form::open(array('route' => array('games.destroy', $game->id), 'method' => 'delete')) }}
						{{ Form::submit('Delete',array('class' => 'btn btn-danger', "onclick" => "return confirm('Are you sure?')")) }}
						{{  Form::close() }}
					</td>
				</tr>
			@endforeach
		@endif
		</table>
		</div>
	</div>
</div>
@stop