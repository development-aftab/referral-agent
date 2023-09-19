@extends('layouts.master')

@push('css')
    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css"/> 
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <style type="text/css">
                a.dt-button, button.dt-button, div.dt-button {
                    background: #4bb542 !important;
                    color: #fff;
                    border-color: #4bb542 !important;
                }
                .agent_table .table>thead:first-child>tr:first-child>th:nth-child(3) {
    width: 100px !important;
}
          </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box agent_table">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}</h3>
                    @can('add-'.str_slug('Agent'))
                        <a class="btn btn-success pull-right" href="{{ url('/agent/agent/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th><th>Current Package</th><th>Charged Date</th><th>Next Charge Date</th><th>Total Payments</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $count = 1;
                                ?>
                            @foreach($agent as $key=>$item)
                            @if($item->hasRole('agent'))
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{ $item->name }}</td><td>{{ ucfirst($item->profile->subscription) }}</td>
                                    <td>@if($item->profile->subscription == 'basic') @else {{ Carbon\Carbon::parse($item->profile->startdate)->format("m/d/Y") }} @endif</td><td>@if($item->profile->subscription == 'basic') @else {{ Carbon\Carbon::parse($item->profile->enddate)->addDays(1)->format("m/d/Y") }} @endif</td><td>${{ $item->Getpayments->sum('amount')??'0' }}</td><td>@if($item->status==1) <badge class="badge badge-success">Active </badge>@else <badge class="badge badge-danger">Deactivated </badge> @endif</td>
                                    <td class="action_btns">
                                        @if($item->request == 0)
                                          
                                               <a href="{{ route('accept_agent') }}/{{ $item->id }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check" aria-hidden="true"></i> approve
                                               </a>
                                          
                                          
                                               <a href="{{ route('reject_agent') }}/{{ $item->id }}" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times" aria-hidden="true"></i> disapprove
                                               </a>
                                          
                                        @endif
                                        @can('view-'.str_slug('Agent'))
                                            <a href="{{ url('/agent/agent/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ route('agent_status') }}/{{ $item->id }}/{{ $item->status }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}">
                                                <button class="btn btn-info btn-sm">
                                                     @if($item->status == 1) Active @else Deactivated @endif
                                                </button>
                                            </a>
                                            <a href="{{ route('show_payments') }}/{{ $item->id }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Payments
                                                </button>
                                            </a>
                                            <br>
                                            <a href="{{ route('Unsubscribe') }}/{{ $item->id }}" class="btn card_btn" >
                                               <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-close" aria-hidden="true"></i> Cancel subscription
                                               </button>
                                            </a>
                                            <form method="POST"
                                                  action="{{ url('/agent/agent' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan

                                        @can('edit-'.str_slug('Agent'))
                                            <a href="{{ url('/agent/agent/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                       {{--  @can('delete-'.str_slug('Agent'))
                                            <form method="POST"
                                                  action="{{ url('/agent/agent' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Agent') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan --}}


                                    </td>
                                </tr>
                             @endif   
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $agent->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
   
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script> 
   <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
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
                 var table = $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] 
                }],
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                {
                extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                extend: 'pdf',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                },
                {
                extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6]
                    }
                }

                ]
            });

        });
    </script>

@endpush
