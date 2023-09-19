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
          </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentDetail') }}</h3>
                    @can('add-'.str_slug('PaymentDetail'))
                        <a class="btn btn-success pull-right" href="{{ url('/paymentDetail/payment-detail/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'PaymentDetail') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                            @if($type == 1)
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Charged Date</th>
                                <th>Next Charge Date</th>
                                <th>Receipt Url</th>
                            @else
                                <th>Current Package</th>
                                <th>Total Payments</th>
                                <th>Action</th>
                            @endif    

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paymentdetail as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->GetUser->name }}</td>
                                @if($type == 1)   
                                    <td>@if($item->amount == 10) Monthly @else Yearly  @endif</td>
                                    <td>${{ $item->amount }}</td>
                                    <td>{{ date_format($item->created_at,"m/d/Y") }}</td>
                                    @if($item->amount == 10)
                                       <td>{{ Carbon\Carbon::parse($item->created_at)->addDays(1)->addMonth()->format("m/d/Y") }}</td>
                                    @else
                                       <td>{{ Carbon\Carbon::parse($item->created_at)->addDays(1)->addYear()->format("m/d/Y") }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ $item->receipt_url }}" target="_blank">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                        </a>
                                        {{--  <a href="{{ route('Unsubscribe') }}/{{ $item->user_id }}" class="btn card_btn" >
                                               
                                                    <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-close" aria-hidden="true"></i> Cancel
                                                    </button>
                                                
                                         </a> --}}
                                    </td>
                                @else
                                   <td>{{ ucfirst($item->GetUser->profile->subscription??'-')}}</td>
                                   <td>${{ $item->GetUser->Getpayments->sum('amount')??'0' }}</td>
                                   <td>
                                    <a href="{{ route('show_payments') }}/{{ $item->user_id }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Payments
                                                </button>
                                    </a>
                                   </td>      
                                @endif   
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $paymentdetail->appends(['search' => Request::get('search')])->render() !!} </div>
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
            @if($type == 1)        
                {
                extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5]
                    }
                },
                {
                extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5]
                    }
                },
                {
                extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5]
                    }
                },
                {
                extend: 'pdf',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5]
                    }
                },
                {
                extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5]
                    }
                }
            @else
                {
                extend: 'copy',
                    exportOptions: {
                        columns: [ 0, 1, 2,3]
                    }
                },
                {
                extend: 'csv',
                    exportOptions: {
                        columns: [ 0, 1, 2,3]
                    }
                },
                {
                extend: 'excel',
                    exportOptions: {
                        columns: [ 0, 1, 2,3]
                    }
                },
                {
                extend: 'pdf',
                    exportOptions: {
                        columns: [ 0, 1, 2,3]
                    }
                },
                {
                extend: 'print',
                    exportOptions: {
                        columns: [ 0, 1, 2,3]
                    }
                }
            @endif

                ]
            });

        });
    </script>

@endpush
