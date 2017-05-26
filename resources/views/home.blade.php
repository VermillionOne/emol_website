@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel-heading">Dashboard</div>

        @foreach ($clients as $client)

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">{{ $client->title }}</div>
                <div class="panel-body">

                    @foreach ($client->projects as $project)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ $project->title }}</th>
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

            </div>

        @endforeach

    </div>
@endsection
