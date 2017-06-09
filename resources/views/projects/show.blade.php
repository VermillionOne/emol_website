@extends('layouts.app')

@section('content')
  <div class="col-sm-9 col-md-9 col-lg-9">

    <div class="page-header">
      <h1><small>Client:</small> {{ $project->client_id }}</h1>
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
        @foreach ($task->times as $time)
          <table class="table">
            <thead>
              <tr>
                <th>{{ $time->title }}</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td></td>
                <td></td>
              </tr>

            </tbody>
          </table>
        @endforeach
      </div>

    @endforeach

  </div>
@endsection
