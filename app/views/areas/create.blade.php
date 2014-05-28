@extends('layouts.default')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
			<button class='btn btn-primary btn-sm pull-right' style="vertical-align: middle;">
					 <a href="{{ URL::route('home') }}">Back </a>
				</button>
		</div>

      	{{Form::open(array('route' => 'location.create',"method"=>"post"))}}


      	@include('includes.alert')
	      	<div class="form-group">
		          	{{ Form::label('area', 'Enter Location Name *') }}
		          	{{ Form::text('area', '', array('class' => 'form-control')) }}
		          	{{$errors->first('area')}}
		    </div>

      	


      	{{ Form::submit('Submit',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Submitting in...')) }}

      	{{ Form::close() }}

    </div>
@stop