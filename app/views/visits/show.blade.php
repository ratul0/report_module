@extends('layouts.fullWidth')

@section('content')
	<div class="col-md-12">
		<div class="page-header">
			<h3>
				{{ $title }}
			</h3>
		</div>
		@include('includes.alert')
		<table class="table table-bordered table-striped" id="example">
			<thead style="background-color:#006a72">
				<tr>
					
					<th>Area Name</th>

					<th>Date</th>

					<th>Visit Hours</th>
					
					
				</tr>
			</thead>

			<tfoot>
	            <tr>
					
					<th>Area Name</th>

					<th>Date</th>

					<th>Visit Hours</th>
					
					
				</tr>
        </tfoot>
			<tbody>
				@foreach($visits as $visit)
					<tr>
						

						<td>{{ Location::where('id','=',$visit->location_id)->first()->location_name }}</td>

						<td>{{ $visit->visited_at }}</td>
						
						<td>{{ $visit->visit_hours }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="text-center">{{ $visits->links() }}</div>
	</div>

	<!-- /*<script type="text/javascript">
		$('#my-table').dynatable({
			  table: {
			    defaultColumnIdStyle: 'trimDash'
			  }
		});
	</script>*/ -->

	<script type="text/javascript">


	$(document).ready(function() {
	    // Setup - add a text input to each footer cell
	    $('#example tfoot th').each( function () {
	        var title = $('#example thead th').eq( $(this).index() ).text();
	        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	    } );
	 
	    // DataTable
	    var table = $('#example').DataTable();
	     
	    // Apply the filter
	    $("#example tfoot input").on( 'keyup change', function () {
	        table
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();
	    } );
	} );


	</script>




@stop