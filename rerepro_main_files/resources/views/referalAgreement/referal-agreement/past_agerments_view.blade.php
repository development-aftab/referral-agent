@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <style type="text/css">
            .status_active {
                background-color: #FF6600;
                color: white;
                padding: 10px 0px;
                border-radius: 25px;
                display: block;
                width: 100%;
                text-align: center;
            }
            .table>tbody>tr>td a>button {
                border-radius: 25px !important;
            }
          </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box referal_agg">
                    <h3 class="box-title pull-left">Referral Agreements</h3>
                    @can('add-'.str_slug('ReferalAgreement'))
                        <a class="btn btn-success pull-right" href="{{ url('/referalAgreement/referal-agreement/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Signed Referral Agreements') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                         <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Area</th><th>ZipCode</th><th>Lead Type</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referalagreement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->zipcode }}</td><td>{{ $item->lead_type }}</td><td>@if($item->status == 0) Pending @elseif($item->status == 3) Canceled @elseif($item->status == 4) Rejected @elseif($item->status == 2) Fully Executed Referral Agreement @endif</td>
                                    <td>
                                     <a href="{{ url('past_certificate/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Agreement
                                                </button>
                                     </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
             </table>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        })

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
