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

  <div class="emol-page-header">
    <h1>Dashboard</h1>
  </div>

  <div class="emol-page-sub-header row">
    <h2>Clients
      <small><a href="{{ route('clients.create') }}"><p class="pull-right"><span class="ion-ios-plus-outline"></span> Add Client</p></a></small>
    </h2>
    <hr>
  </div>

  @foreach ($clients as $client)

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">{{ $client->title }}</div>
      <div class="panel-body">

        <div class="row">

          <div class="col-md-6">

            <ul class="fa-ul">

              @if ($client->address || $client->address_2 || $client->city || $client->state || $client->zipcode )
                <li><i class="fa-li fa fa-map-marker"></i>
                  {{ $client->address }} @if ($client->address_2) {{ $client->address_2 }} @endif <br>
                @if ($client->city){{ $client->city }}, @endif {{ $client->state }} {{ $client->zipcode }}</li>
              @endif

              <li><i class="fa-li fa fa-phone"></i>{{ $client->phone }}</li>
              <li><i class="fa-li fa fa-envelope"></i>{{ $client->email }}</li>
            </ul>

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
