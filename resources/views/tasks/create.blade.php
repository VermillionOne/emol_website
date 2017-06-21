@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
      <div class="alert alert-success">
          {{ session('flash_message') }}
      </div>
  @endif

  <div class="emol-page-header">
    <h1>Add New Task</h1>
  </div>

  <form action="{{ route('tasks.store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label for="title">Task Name</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
      <label for="title">Due Date</label>
      <input type="text" class="form-control" id="address" name="address">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
