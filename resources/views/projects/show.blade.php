@extends('layouts.app')

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9">

    <div class="page-header">
      <h1><small>Client:</small> {{ $project->client->title }}</h1>
    </div>

    <div class="page-header">
      <h1><small>Project:</small> {{ $project->title}}</h1>
    </div>

    @foreach ($project->tasks as $task)

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $task->title }}</div>

        <div class="panel-body">
          <p></p>
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

            </tbody>
          </table>
      </div>

    @endforeach

    <div class="add-project-button">
      <a href="{{route('task.create')}}">
        <p><span class="ion-ios-plus-outline"></ul>Add Task</p>
      </a>
    </div>

  </div>
@endsection
