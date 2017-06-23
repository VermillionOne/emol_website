@extends('layouts.app')

@section('content')

  <div class="emol-page-header">
    <h1>Task List</h1>
  </div>


  @foreach ($tasks as $task)

    <div class="task-item">
      <p class="title"><span class="fa fa-square-o"></span> {{ $task->title }} </p>
    </div>

  @endforeach

@endsection
