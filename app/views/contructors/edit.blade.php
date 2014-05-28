@extends('layouts.default')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
			<button class='btn btn-primary btn-sm pull-right' style="vertical-align: middle;">
					 <a href="{{ URL::route('contructor.index') }}">Back </a>
				</button>
		</div>

      	{{Form::open(array('route' => 'contructor.edit',"method"=>"put"))}}


      	@include('includes.alert')

      		<div class="form-group">
		          	{{ Form::label('location', 'Select An location For This contructor: *') }}
		          	{{Form::select('location',$locations,$contructor->location_id,array('class'=>'form-control'));}}
		          	{{$errors->first('location')}}
		     </div>
	      	<div class="form-group">
		          	{{ Form::label('contructor', 'Enter Contructor Name *') }}
		          	{{ Form::text('contructor',$contructor->contructor_name , array('class' => 'form-control')) }}
		          	{{$errors->first('contructor')}}
		    </div>

      	
		    {{Form::hidden('contructor_id',$contructor->id)}}

      	{{ Form::submit('Update',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Submitting in...')) }}

      	{{ Form::close() }}

    </div>
@stop