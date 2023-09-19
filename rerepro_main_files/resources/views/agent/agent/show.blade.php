@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }} {{ $agent->id }}</h3>
                    @can('view-'.str_slug('Agent'))
                        <a class="btn btn-success pull-right" href="{{ url('/agent/agent') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $agent->id }}</td>
                            </tr>
                            <tr><th> Agent Name </th><td> {{ $agent->name }} </td></tr>
                            <tr><th> Agent Email </th><td> {{ $agent->email }} </td></tr>
                            <tr><th> Agent Address </th><td> {{ $agent->profile->agent_address }} </td></tr>
                            <tr><th> Agent Phone </th><td> {{ $agent->profile->phone }} </td></tr>
                            <tr><th> Agent Website </th><td> {{ $agent->profile->agent_website }} </td></tr>
                            <tr><th> Brokerage/Company </th><td> {{ $agent->profile->brokerage_company }} </td></tr>
                            <tr><th> Brokerage/Company Phone </th><td> {{ $agent->profile->brokerage_company_phone }} </td></tr>
                            <tr><th> Brokerage/Company Address </th><td> {{ $agent->profile->brokerage_company_address }} </td></tr>
                            <tr><th> License Number </th><td> {{ $agent->profile->license_number }} </td></tr>
                            <tr><th> License State </th><td> {{ $agent->profile->license_state }} </td></tr>
                            <tr><th> Managing Broker Name </th><td> {{ $agent->profile->managing_broker_name }} </td></tr>
                            <tr><th>  Date In Enrolled </th><td>{{ date_format($agent->created_at,"m/d/Y") }} </td></tr>
                            <tr><th>  Next Charge Date </th><td>@if($agent->profile->subscription == 'basic') @else {{ Carbon\Carbon::parse($agent->profile->enddate)->addDays(1)->format("m/d/Y") }} @endif </td></tr>
                            <tr><th>Package</th><td> {{ ucfirst($agent->profile->subscription) }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

