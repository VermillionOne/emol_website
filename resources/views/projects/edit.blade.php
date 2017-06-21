@extends('layouts.app')

@section('content')

  <div class="emol-page-header">
    <h1>Edit Project</h1>
  </div>

  <form action="{{ route('projects.update', $project->id) }}" method="POST" role="form">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label for="title">Project Client</label>
      <select name="client_id" id="client_id" class="form-control" required="required">
        @foreach ($clients as $client)
          @if ($client->id == $project->client_id)
            <option value="{{ $client->id }}" selected="selected">{{ $client->title }}</option>
          @else
            <option value="{{ $client->id }}">{{ $client->title }}</option>
          @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="title">Project Title</label>
      <input type="text" class="form-control" value="{{$project->title}}" id="title" name="title">
    </div>

    <div class="form-group">
      <label for="title">Projected Cost</label>
      <input type="number" class="form-control" value="{{$project->projected_cost}}" id="projected_cost" name="projected_cost">
    </div>

    <div class="form-group">
      <label for="title">Planned Hours</label>
      <input type="number" class="form-control" value="{{$project->planned_hours}}" id="planned_hours" name="planned_hours">
    </div>

    <div class="form-group">
      <label for="title">Deadline Date</label>
      <input type="date" class="form-control" value="{{$project->deadline_date}}" id="deadline_date" name="deadline_date">
    </div>

    <div class="form-group">
      <label for="title">Hourly Rate</label>
      <input type="text" class="form-control" value="{{$project->hourly_rate}}" id="hourly_rate" name="hourly_rate">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
