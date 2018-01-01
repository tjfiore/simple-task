@if(count($errors) > 0)

	<center>
		<div class="alert alert-danger" style="margin:20px 20px; width:30%; text-align:center;">
			<strong>Whoops! Something went wrong!</strong>

		    <br> <br>

		    <ul>
		    	@foreach ($errors -> all() as $error)
		    		<li>
		    			{{$error}}
		    	  </li>
		    	@endforeach
		    </ul>

	  </div>
  </center>

@endif
