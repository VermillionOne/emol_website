@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ session('flash_message') }}
      </div>
  @endif

  <div class="col-sm-9 col-md-9 col-lg-9">

    <div class="page-header">
      <h1><small>Client:</small> {{ $project->client->title }}</h1>
    </div>

    <div class="page-header">
      <h1><small>Project:</small> {{ $project->title}}</h1>
    </div>

    @foreach ($project->tasks as $task)

      <div class="panel">
        <!-- Default panel contents -->
        <div class="panel-heading">
          <h3 class="panel-title">{{ $task->title }} <small class="pull-right">Due Date:{{ $task->due_date }}</small></h3>
        </div>

        <!-- Table -->
        <table class="table">
          <thead>
            <tr>
              <th>Time Description</th>
              <th>Elapsed Time</th>
              <th>Hourly Rate</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($task->times as $time)
              <tr>
                <td>{{ $time->title }}</td>
                <td>{{ $time->time_span }}</td>
                <td>{{ $time->value_per_hour }}</td>
              </tr>
            @endforeach
              <tr class="collapse" id="collapseAddTime_{{ $task->id }}">
                <form class="form-inline" action="{{ route('times.store') }}" method="POST" role="form">
                  <td>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <input class="form-control" placeholder="Work Accomplished" type="text" name="time_title" id="time_title">
                  </td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" placeholder="Time Spent" type="number" name="time_span" id="time_span">
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input class="form-control" placeholder="Cost per Hour" type="text" name="value_per_hour" id="value_per_hour">
                    </div>
                  </td>
                  <td>
                    <button type="submit" class="btn btn-primary pull-right">Add Time</button>
                  </td>
                </form>
              </tr>
              <tr>
                <td colspan="4">
                  <a role="button" data-toggle="collapse" href="#collapseAddTime_{{ $task->id }}" aria-expanded="false" aria-controls="collapseAddTime_{{ $task->id }}">
                    <p><span class="ion-ios-plus-outline"></ul> Add Time to Task</p>
                  </a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>

    @endforeach

    <div>
      <div class="panel panel-default collapse" id="collapseAddTask">
        <div class="panel-heading">
          <h3 class="panel-title">
            <form class="form-inline" action="{{ route('tasks.store') }}" method="POST" role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="project_id" value="{{ $project->id }}">
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Task Title" name="task_title" id="task_title">
              </div>
              <div class="form-group">
                <input class="form-control" type="date" placeholder="Due Date" name="due_date" id="due_date">
              </div>
              <div class="form-group">
                <input type="submit" value="Add Task" class="btn btn-primary">
              </div>
            </form>
          </h3>
        </div>
      </div>
    </div>

    <div class="add-project-button">
      <a role="button" data-toggle="collapse" href="#collapseAddTask" aria-expanded="false" aria-controls="collapseAddTask">
        <p><span class="ion-ios-plus-outline"></ul> New Task</p>
      </a>
    </div>

  </div>
@endsection


