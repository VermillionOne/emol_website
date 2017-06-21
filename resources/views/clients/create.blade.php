@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
      <div class="alert alert-success">
          {{ session('flash_message') }}
      </div>
  @endif

  <div class="emol-page-header">
    <h1>Add New Client</h1>
  </div>

  <form action="{{ route('clients.store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label for="title">Company/Client Name</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="form-group">
      <label for="title">Address</label>
      <input type="text" class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
      <label for="title">Address 2</label>
      <input type="text" class="form-control" id="address_2" name="address_2">
    </div>

    <div class="form-group">
      <label for="title">City</label>
      <input type="text" class="form-control" id="city" name="city">
    </div>

    <div class="form-group">
      <label for="title">State</label>
      <input type="text" class="form-control" id="state" name="state">
    </div>

    <div class="form-group">
      <label for="title">Zipcode</label>
      <input type="text" class="form-control" id="zipcode" name="zipcode">
    </div>

    <div class="form-group">
      <label for="title">Phone</label>
      <input type="phone" class="form-control" id="phone" name="phone">
    </div>

    <div class="form-group">
      <label for="title">E-mail</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
