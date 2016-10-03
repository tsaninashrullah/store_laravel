<table class="table table-hover">
	<tr>
		<th><center>Title</center></th>
		<th><center>Author</center></th>
		<th><center>Email</center></th>
		<th><center>Cover</center></th>
		<th colspan="3" align="center"><center>Action</center></th>
	</tr>
	@foreach ($games as $game)
		<tr>
			<td>{{ $game->title }}</td>
			<td>{{ $game->author }}</td>
			<td>{{ $game->email }}</td>
			<!-- <td>{{ $game->description }}</td> -->
			<td align="center"><img src="{{ asset('uploads/images/' . $game->id . '/' . $game->image) }}" style="max-height:200px;max-width:200px;margin-top:10px;"></td>
			<td width="10%">
			<i class="btn btn-success btn-fab-mini">
				{{ link_to('games/'.$game->id, 'visibility', array('class' => 'material-icons')) }}
			</i>
			</td>
			<td width="10%">
			<i class="btn btn-info btn-fab-mini">
				{{ link_to('games/'.$game->id.'/edit', 'mode_edit', array('class' => 'material-icons')) }} 
			</i>
			</td>
			<td width="10%">
			<i class="btn btn-danger btn-fab-mini">
				{{ Form::open(array('route' => array('games.destroy', $game->id), 'method' => 'delete')) }}
				{{ Form::submit('warning',array('class' => 'material-icons', "onclick" => "return confirm('Are you sure?')")) }}
				{{  Form::close() }}
			</i>
			</td>
		</tr>
	@endforeach
</table>
<div class="row col-lg-12">
			<center>{{ $games->links() }}</center>
		</div>