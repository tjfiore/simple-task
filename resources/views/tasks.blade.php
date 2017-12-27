@extends('layouts.master')

@section('content')
@include('headers.mainHeader')

@if(Session::has('message'))
 <div class="alert alert-info">{{Session::get('message')}}</div>
@endif

  <a class="btn btn-primary" data-toggle="collapse" href="#center" aria-expanded="false" aria-controls="collapseExample">
   New Task
 </a>
@include('addTask')

@if(count($tasks) > 0)
  <center><h2 style="margin-bottom:20px">Your Tasks</h2></center>
  <hr width=20%> <br>

  @foreach ($tasks as $task)
  <center>
    <div class="card w-50" style="margin:10px;">
        <div style="padding:5px;">{{$task->name}}</div>
      <div class="card-block">
        {{$task->description}}
      </div>
      <div class="modal-footer">
        <form>
        <a href="#" class="btn btn-primary" data-toggle="modal"
        data-target="#edit-{{ $task->id }}">Edit</a>
        </form>

        <form action="{{ url('task/'.$task->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
        </form>

      </div>
    </div>
  </center>

  @include('modals.editTaskModal')
  @endforeach
@else

  <center><h2>No Task Available</h2></center>

@endif

@endsection
