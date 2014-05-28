@extends('layouts.fullWidth')

@section('content')
	<div class="col-md-12">
		<div class="page-header">
			<h2>{{ $title }}</h2>
		</div>
		@if(Auth::check())
			<h1>Welcome {{ Auth::user()->user_name }}</h1>
		@else
			<h1>Home Page...</h1>
		@endif
      	
    </div>
@stop