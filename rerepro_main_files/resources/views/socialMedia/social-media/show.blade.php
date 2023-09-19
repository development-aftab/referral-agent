@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SocialMedia') }} {{ $socialmedia->id }}</h3>
                    @can('view-'.str_slug('SocialMedia'))
                        <a class="btn btn-success pull-right" href="{{ url('/socialMedia/social-media') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $socialmedia->id }}</td>
                            </tr>
                            <tr><th> Icon </th><td> {{ $socialmedia->icon }} </td></tr><tr><th> Link </th><td> {{ $socialmedia->link }} </td></tr><tr><th> Name </th><td> {{ $socialmedia->name }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

