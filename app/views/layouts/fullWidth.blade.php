<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>{{$title}}</title>
	    {{HTML::style('/css/bootstrap.min.css')}}
	    {{ HTML::style("/css/jquery.dataTables.css") }}
	    <!-- {{HTML::style('/css/bootswatch.min.css')}} -->
	    <!-- {{HTML::style('/css/main.css')}} -->
	    {{HTML::script('/js/jquery.min.js')}}
	    {{HTML::script('/js/bootstrap.min.js')}}
	    {{HTML::script('/js/bootswatch.js')}}
	    
	    {{ HTML::script('js/jquery.dataTables.js') }}
	    {{HTML::script('/js/Chart.min.js')}}
  </head>
	
	<body>
        @include('includes.topNav')
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
            @include('includes.footer')
        </div>
    </body>
</html>
