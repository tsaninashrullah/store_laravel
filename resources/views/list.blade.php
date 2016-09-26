@extends('layouts.app')

@section('content')
<style type="text/css">
	.clearfix:after {
		content: ".";
		display: block;
		clear: both;
		visibility: hidden;
		line-height: 0;
		height: 0;
	}

	.clearfix {
		display: inline-block;
	}

	html[xmlns] .clearfix{
		display: block;
	}

	html .clearfix {
		height: 1%;
	}
	.hey {
		font: normal 50px impact;
	}
	
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <div id="wrapper">
            <h1 align="center">Welcome to <div class="hey">TRSNW</div> Games Store</h1>
            <br>
            <div id="content">
			@foreach ($games as $game)
			<div class="col-lg-6 col-sm-3">
				<strong><h3 align="center">{{ $game->title }}</h3></strong>
				<p>
				<a href="comments_user/{{$game->id}}"><img src="{{ asset('uploads/images/' . $game->id . '/' . $game->image)  }}" width="100%"></a>
				<br>
            	</p>
        	</div>
        	@endforeach
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12">
		        <center>{{ $games->render() }}</center>
        	</div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="masonry.pkgd.min.js"></script>
<script type="text/javascript">
	$("#content").masonry();
</script>
@endsection
