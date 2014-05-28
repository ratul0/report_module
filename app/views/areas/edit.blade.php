@extends('layouts.fullWidth')

@section('content')
	
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>

		</div>
		

      	{{Form::open(array('route' => 'location.edit',"method"=>"put"))}}


      	@include('includes.alert')
	      	<div class="form-group">
		          	{{ Form::label('area', 'Edit Area Name *') }}
		          	{{ Form::text('area', $area->location_name, array('class' => 'form-control')) }}
		          	{{$errors->first('area')}}
		    </div>

      	
		{{Form::hidden('area_id',$area->id)}}

      	{{ Form::submit('Submit',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Submitting in...')) }}

      	{{ Form::close() }}


    </div>

@stop