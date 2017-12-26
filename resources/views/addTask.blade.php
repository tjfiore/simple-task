@section('content')

<!-- display validation errors -->
@include('common.errors')

  <div class="container" style="width:500px; margin: 0 auto;">
    <!-- New Task Form -->
    <form action="{{ url('task/add') }}" method="POST" class="form-inline">
      	{{ csrf_field()}}

    	<!-- Task Name -->
    	<div class="form-group row">
      	<!-- <label for="task-name" class="col-sm-2 col-form-label">Task</label> -->
        <div class="col-sm-10" style="margin:3px;">
          <input type="text" name="name" id="task-name" class="form-control" placeholder="Enter task" value="{{old('name')}}">
        </div>
    	</div>

    	<!-- Add Task Button -->
      <button type="submit" class="btn btn-outline-primary">Add Task</button>
    </form>
  </div>

  <br> <br> <hr width="70%"> <br>
