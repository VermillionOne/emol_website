@extends('layouts.app')

@section('content')

  <div class="emol-page-header">
    <h1>Dashboard</h1>
    <div class="pull-right">

    </div>
  </div>

  @foreach ($clients as $client)

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">{{ $client->title }}</div>
      <div class="panel-body">

        <div class="row">

          <div class="col-md-6">
            <div class="address"></div>
            <div class="phone"></div>
            <div class="email"></div>
          </div>

          <div class="col-md-6">

            <h3>Current Projects:</h3>

            <ul class="current-project-listw">
              @foreach ($client->projects as $project)
                <li>
                  <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                </li>
              @endforeach
            </ul>

          </div>

        </div>

      </div>

    </div>

  @endforeach

@endsection
