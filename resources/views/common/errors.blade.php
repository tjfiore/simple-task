@if(count($errors) > 0)

		<div class="alert alert-danger alert-dismissible" role="alert">
			<div class="container">
	      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>

			<strong>Whoops! Something went wrong!</strong>

		    <br>

		    <ul>
		    	@foreach ($errors -> all() as $error)
		    		<li>
		    			{{$error}}
		    	  </li>
		    	@endforeach
		    </ul>
			</div>
	  </div>

@endif
