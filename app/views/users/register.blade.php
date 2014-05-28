@extends('layouts.fullWidth')

@section('content')
	<div class="col-md-5 col-md-offset-3">
		<div class="page-header">
			<h2>{{ $title }}</h2>
		</div>

      	{{Form::open(array('route' => 'register'))}}


      	@include('includes.alert')
	      	<div class="form-group">
		          	{{ Form::label('username', 'User Name *') }}
		          	{{ Form::text('username', '', array('class' => 'form-control')) }}
		          	{{$errors->first('username')}}
		    </div>

		    <div class="form-group">
		          	{{ Form::label('email', 'Email *') }}
		          	{{ Form::text('email', '', array('class' => 'form-control')) }}
		          	{{$errors->first('email')}}
		    </div>

	        <div class="form-group">
	          	{{ Form::label('password', 'Password *') }}
	          	
	          	{{ Form::password('password', array('class' => 'form-control')) }}
	          	{{$errors->first('password')}}
	        </div>

	        <div class="form-group">
	          	{{ Form::label('password_confirmation', 'Confirm Password *') }}
	          	
	          	{{ Form::password('password_confirmation', array('class' => 'form-control')) }}
	          	{{$errors->first('password_confirmation')}}
	        </div>

	     	<div class="form-group">
		          	{{ Form::label('age', 'Age *') }}
		          	{{ Form::text('age', '', array('class' => 'form-control')) }}
		          	{{$errors->first('age')}}
		    </div>

		    <div class="form-group">
		          	{{ Form::label('phone', 'Phone *') }}
		          	{{ Form::text('phone', '', array('class' => 'form-control')) }}
		          	{{$errors->first('phone')}}
		    </div>

		 	<div class="form-group">
		 		<span>
		 		{{Form::checkbox('agree', null)}}
		 		{{ Form::label('agree', 'I agree to the Application Terms of Service  and Privacy Policy.') }}
		 		</span>
		 		{{$errors->first('agree')}}
		 	</div>

      	{{ Form::submit('register',array('class' => 'btn btn-primary btn-lg', 'data-loading-text' => 'Registering User...')) }}

      	{{ Form::close() }}

      	<hr/>

      	Do You have an account? {{ link_to_route('login', 'Login here', array(), array('class' => 'btn btn-success btn-sm')) }}
    </div>
@stop