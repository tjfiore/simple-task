@section('content')

<!-- display validation errors -->
@include('common.errors')

  <div class="container collapse" id="center" style="margin-top:10px;">
      <h3>Create Task</h3>
    <!-- New Task Form -->
    <form action="{{ url('task/add') }}" method="POST" class="form-horizontal" >
      	{{ csrf_field()}}

    	<!-- Task Name -->
    	<div class="form-group">
      	 <label for="task-name">Title</label>
          <!-- <div class="col-10"> -->
            <input type="text" name="name" id="task-name" class="form-control" placeholder="Enter task" value="{{old('name')}}">
          <!-- </div> -->
      </div>

      <div class="form-group">
        <label for="descript">Description</label>
        <!-- <div class="col-10"> -->
          <textarea class="form-control" name="description" id="descript" rows="4" placeholder="..." value="{{old('description')}}"></textarea>
        <!-- </div> -->
      </div>

      <!-- Add Task Button -->
      <button type="submit" class="btn btn-outline-primary">Add Task</button>
      <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#center" style="margin-left:5px;">Cancel</button>
    </form>


  </div>

  <br> <br> <br>

  <style media="screen">
    #descript{
      resize:none;
    }
    #center{
      width:30%;
      margin: 0 auto;
      border: 2px solid #4169E1;
      border-radius: 2px;
    }
    h3{
      text-transform: uppercase;
      text-align: center;
      margin: 5px 50px 5px 50px;
      padding: 10px;
    }

  </style>
