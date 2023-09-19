@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'CommonSetting') }} {{ $commonsetting->id }}</h3>
                    @can('view-'.str_slug('CommonSetting'))
                        <a class="btn btn-success pull-right" href="{{ url('/commonSetting/common-setting') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $commonsetting->id }}</td>
                            </tr>
                            <tr><th> Title </th><td> {{ $commonsetting->title }} </td></tr><tr><th> Favicon </th><td> {{ $commonsetting->favicon }} </td></tr><tr><th> Dashboard Logo </th><td> {{ $commonsetting->dashboard_logo }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

