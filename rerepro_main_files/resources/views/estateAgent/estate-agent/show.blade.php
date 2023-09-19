@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'EstateAgent') }} {{ $estateagent->id }}</h3>
                    @can('view-'.str_slug('EstateAgent'))
                        <a class="btn btn-success pull-right" href="{{ url('/estateAgent/estate-agent') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $estateagent->id }}</td>
                            </tr>
                            <tr><th> Title </th><td> {{ $estateagent->title }} </td></tr><tr><th> Description </th><td> {{ $estateagent->description }} </td></tr><tr><th> Image </th><td> {{ $estateagent->image }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

