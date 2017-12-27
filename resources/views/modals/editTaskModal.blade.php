<!-- Modal -->
<div class="modal fade" id="edit-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="{{ url('task/edit/'.$task->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
             <label for="task-name">Title</label>
            <input type="text" name="name" id="task-name" value="{{$task->name}}" class="form-control">
          </div>
          <div class="form-group">
            <label for="descript">Description</label>
           <textarea class="form-control" name="description" id="descript" rows="4" placeholder="..." value="{{$task->description}}"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>

    </div>
  </div>
</div>
