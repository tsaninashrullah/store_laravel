@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col lg-12">
		<header><h1 align="Center"> List Data Game</h1></header>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
	<div class="col lg-12">
		@if(count($games) == 0)
			<br>
			<br>
			<h4 align="center">Sorry data not yet available, You can {{ link_to('games/create', 'Create', array('class' => 'btn btn-raised btn-primary')) }} the data. OR <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Import</button> Your Data</h4>
		<!-- MODAL -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Select Your excel to Import your data</h4>
		      </div>
			  {{ Form::open(array('url' => 'import_games', 'files' => true)) }}
		      <div class="modal-body">
		        <p>{{ Form::file('games') }}</p>
		      </div>

		      <div class="modal-footer">
			  {{ Form::submit('Import', array('class' => 'btn btn-primary')) }}
		      </div>
			  {{ Form::close() }}
		    </div>

		  </div>
		</div>
		<!-- END MODAL -->
		@else
		<div class="col-lg-10">
		&nbsp;
		</div>
		<div class="col-lg-2">
			<div class="btn-group">
              <a href="javascript:void(0)" class="btn btn-info">Excel</a>
              <a href="bootstrap-elements.html" data-target="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Import</a></li>
                <li class="divider"></li>
                <li><a href="export_games">Export</a></li>
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
			  {{ Form::open(array('url' => 'import_games', 'files' => true)) }}
		      <div class="modal-body">
		        <p>{{ Form::file('games') }}</p>
		      </div>

		      <div class="modal-footer">
			  {{ Form::submit('Import', array('class' => 'btn btn-primary')) }}
		      </div>
			  {{ Form::close() }}
		    </div>

		  </div>
		</div>
		<!-- END MODAL -->
		</div>
		<div class="col-md-9">
		{{ link_to('games/create', 'add', array('class' => 'material-icons right', $value= 'asjdsad')) }} <i>Create</i>
		</div>
		<div class="col-md-3 search">
	      <div class="input-group input-group-sm">
	        <input type="text" class="form-control" id="keywords" placeholder="Keywords">
	        <span class="input-group-btn">
	        <button id="search" class="btn btn-info btn-flat" type="button">
	        Go!
	        </button>
	        </span>
	      </div><!-- /input-group -->
	    </div>
		<br>
		<br>
		</div>

		<div class="row col-lg-12">
		<div class="table-responsive">
		<div id="games-list">
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
		</div>
		@endif
	    </div>
	    </div>
		<!-- <img src="uploads/images/1/1.jpg" width="40%"> -->
	</div>
</div>
<script type="text/javascript">

 
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {

  $(document).on('click', '.pagination a', function(e) {

    get_page($(this).attr('href').split('page=')[1]);

    e.preventDefault();

  });

});

function get_page(page) {

  $.ajax({

    url : '/games?page=' + page,

    type : 'GET',

    dataType : 'json',

    success : function(data) {
    	console.log(data);
      $('#games-list').html(data['view']);

    },

    error : function(xhr, status, error) {

      console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);

    },

    complete : function() {

      alreadyloading = false;

    }

  });

}
$('#search').on('click', function(){

  $.ajax({
    url : '/games',
    type : 'GET',
    dataType : 'json',
    data : {
      'keywords' : $('#keywords').val()
    },
    success : function(data) {
      $('#games-list').html(data['view']);
    },
    error : function(xhr, status) {
      console.log(xhr.error + " ERROR STATUS : " + status);
    },
    complete : function() {
      alreadyloading = false;
    }
  });
});
</script>
@stop
