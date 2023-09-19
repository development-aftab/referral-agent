@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AgentZipcode') }} {{ $agentzipcode->id }}</h3>
                    @can('view-'.str_slug('AgentZipcode'))
                        <a class="btn btn-success pull-right" href="{{ url('/agentZipcode/agent-zipcode') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $agentzipcode->id }}</td>
                            </tr>
                            <tr><th> Address </th><td> {{ $agentzipcode->address }} </td></tr><tr><th> State </th><td> {{ $agentzipcode->state }} </td></tr><tr><th> Lat </th><td> {{ $agentzipcode->lat }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

