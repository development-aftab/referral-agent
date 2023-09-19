@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }} {{ $referalagreement->id }}</h3>
                    @can('view-'.str_slug('ReferalAgreement'))
                        <a class="btn btn-success pull-right" href="{{ url('/referalAgreement/referal-agreement') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $referalagreement->id }}</td>
                            </tr>
                            <tr><th> Lead Id </th><td> {{ $referalagreement->lead_id }} </td></tr><tr><th> Sender Id </th><td> {{ $referalagreement->sender_id }} </td></tr><tr><th> Receiver Id </th><td> {{ $referalagreement->receiver_id }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

