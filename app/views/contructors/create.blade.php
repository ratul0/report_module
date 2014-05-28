@extends('layouts.default')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
			<button class='btn btn-primary btn-sm pull-right' style="vertical-align: middle;">
					 <a href="{{ URL::route('home') }}">Back </a>
				</button>
		</div>

      	{{Form::open(array('route' => 'contructor.create',"method"=>"post"))}}


      	@include('includes.alert')

      		<div class="form-group">
		          	{{ Form::label('location', 'Select An Location For This Contructor: *') }}
		          	{{Form::select('location',$locations,NULL,array('class'=>'form-control'));}}
		          	{{$errors->first('location')}}
		     </div>
	      	<div class="form-group">
		          	{{ Form::label('contructor', 'Enter Contructor Name *') }}
		          	{{ Form::text('contructor', '', array('class' => 'form-control')) }}
		          	{{$errors->first('contructor')}}
		    </div>

      	


      	{{ Form::submit('Submit',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Submitting in...')) }}

      	{{ Form::close() }}

    </div>
@stop