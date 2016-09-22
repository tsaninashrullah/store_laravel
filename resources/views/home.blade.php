@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 align="center">Has Login</h1>
            <?php
            $user = Sentinel::check();
            ?>
            @if(isset($value))
            <h2>{{ link_to('logout', 'Logout') }}</h2>
            @else
            Mantap euy
            @endif
        </div>
    </div>
</div>
@endsection
