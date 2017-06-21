@extends('layouts.app')

@section('content')

  <div class="emol-page-header">
    <h1>Edit Client</h1>
  </div>

  <form action="{{ route('clients.update', $client->id) }}" method="POST" role="form">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label for="title">Company/Client Name</label>
      <input type="text" class="form-control" value="{{ $client->title }}" id="title" name="title">
    </div>

    <div class="form-group">
      <label for="title">Address</label>
      <input type="text" class="form-control" value="{{ $client->address }}" id="address" name="Address">
    </div>

    <div class="form-group">
      <label for="title">Address 2</label>
      <input type="text" class="form-control" value="{{ $client->address_2 }}" id="address2" name="Address 2">
    </div>

    <div class="form-group">
      <label for="title">City</label>
      <input type="text" class="form-control" value="{{ $client->city }}" id="city" name="City">
    </div>

    <div class="form-group">
      <label for="title">State</label>
      <input type="text" class="form-control" value="{{ $client->state }}" id="state" name="State">
    </div>

    <div class="form-group">
      <label for="title">Zipcode</label>
      <input type="text" class="form-control" value="{{ $client->zipcode }}" id="zipcode" name="Zipcode">
    </div>

    <div class="form-group">
      <label for="title">Phone</label>
      <input type="phone" class="form-control" value="{{ $client->phone }}" id="phone" name="Phone">
    </div>

    <div class="form-group">
      <label for="title">E-mail</label>
      <input type="email" class="form-control" value="{{ $client->email }}" id=email" name="E-mail">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
