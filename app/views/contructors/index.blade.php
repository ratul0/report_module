@extends('layouts.fullWidth')

@section('content')
	<div class="col-md-12">
		<div class="page-header">
			<h3>
				{{ $title }}
			</h3>
		</div>
		@include('includes.alert')
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>contructor Name</th>
					<th>Area Name</th>
					
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contructors as $contructor)
					<tr>
						<td>{{ $contructor->contructor_name }}</td>

						<td>{{ Location::where('id','=',$contructor->location_id)->first()->location_name }}</td>

						
						<td>
							<a href="{{ URL::route('contructor.edit',$contructor->id); }}" class='btn btn-success btn-sm'>
					        	Edit
							</a>
						</td>
	        			<td>
							<a href="{{ URL::route('contructor.delete',$contructor->id); }}" class='btn btn-danger btn-sm'>
					        	Delete
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="text-center">{{ $contructors->links() }}</div>
	</div>




@stop