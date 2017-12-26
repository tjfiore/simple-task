@extends('layouts.master')

@section('content')

@if(Session::has('message'))
 <div class="alert alert-info">{{Session::get('message')}}</div>
@endif


@include('addTask')

@if(count($tasks) > 0)

  @foreach ($tasks as $task)

  <center>
    <div class="card w-50" style="margin:10px;">
      <div class="card-block">
        {{$task->name}}
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

  <h2>No Task Available</h2>

@endif
