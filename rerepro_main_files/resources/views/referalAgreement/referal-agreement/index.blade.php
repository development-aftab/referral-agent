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
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Signed Referral Agreements ' . $attribute.'') }}</h3>
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
                                <th>Sender</th><th>Receiver</th><th>Area</th><th>ZipCode</th><th>Lead Type</th><th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($referalagreement as $item)
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->GetSender->name }}</td><td>{{ $item->GetReceiver->name }}</td><td>{{ $item->location }}</td>
                                    <td>{{ $item->zipcode }}</td><td>{{ $item->lead_type }}</td><td><a class="status_btn status_active">@if($item->status == 0) Pending @elseif($item->status == 3) Canceled @elseif($item->status == 4) Rejected @elseif($item->status == 2) Fully Executed Referral Agreement @endif</a></td>
                                    <td>
                                        @can('view-'.str_slug('ReferalAgreement'))
                                            {{-- <a href="{{ url('/referalAgreement/referal-agreement/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a> --}}
                                        @endcan
                                    @if($attribute == "")
                                      <a href="{{ url('get_certificate/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View Agreement
                                                </button>
                                            </a>
                                    @endif
                                    @if($attribute == "Send")  
                                        @if($item->status == 0)
                                            @if($item->receiver_sing == 1)
                                          
                                               <a href="{{ route('lead_send_accept') }}/{{ $item->id }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-check" aria-hidden="true"></i> accept
                                               </a>
                                            @endif
                                            <a href="{{ route('lead_cancel') }}/{{ $item->id }}"
                                                   title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                    <button class="btn btn-danger btn-sm">
                                                       <i class="fa fa-times" aria-hidden="true"></i> Cancel
                                                    </button>
                                            </a>
                                        @endif    
                                    @endif 
                                    @if($attribute == "Recevied")
                                     @if($item->receiver_sing == 0 && $item->status == 0)
                                        <a href="{{ route('lead_recever_accept') }}/{{ $item->id }}" class="btn btn-success btn-sm">
                                                            <i class="fa fa-check" aria-hidden="true"></i> accept
                                        </a>
                                        <a href="{{ route('lead_recever_reject') }}/{{ $item->id }}" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-times" aria-hidden="true"></i> Reject
                                        </a>
                                     @else
                                        Waiting for Sender to Accept   
                                     @endif   
                                    @endif
                                        @can('edit-'.str_slug('ReferalAgreement'))
                                            <a href="{{ url('/referalAgreement/referal-agreement/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('ReferalAgreement'))
                                            <form method="POST"
                                                  action="{{ url('/referalAgreement/referal-agreement' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'ReferalAgreement') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $referalagreement->appends(['search' => Request::get('search')])->render() !!} </div>
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
