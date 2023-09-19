@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <style>
        .disclaim {
            display: flex;
            align-items: center;
            border: 1px solid #ff6600;
            border-radius: 7px;
            padding: 0px 20px;
        }

        .disclaim h1 {
            font-size: 60px;
            padding-right: 10px;
            color: #ff6600;
        }
        .disclaim h3{
            color: #8a989b;
        }
        .white-box>a{
            background-color: #ff6600;
            color: white;
            margin: 0px;
            margin-top: 18px;
            border: 1px solid #ff6600;
            transition: .7s;
        }
        .white-box>a:hover{
            background-color: white;
            color: #ff6600;
            border: 1px solid #ff6600;
        }

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="disclaim">
                        <h1>!</h1>
                        <h3>Basic users are allowed one coverage area.  Premium subscription users are allowed up to 5 coverage location areas.  All users will appear within a 30-mile radius of their coverage area when searched.</h3>
                    </div>
                    {{--<h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Basic users are allowed one coverage area.  Premium subscription users are allowed up to 5 coverage location areas.  All users will appear within a 30-mile radius of their coverage area when searched.') }}</h3>--}}
                       @if(Auth::user()->profile->subscription == "basic")
                          @if($count==0)
                            <a class="btn btn-success pull-right" href="{{ url('/agentZipcode/agent-zipcode/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Area Cover') }}</a>
                          @else
                           <a href="{{ url('subscription/subscription') }}" class="btn btn-success pull-right">  Please Get Subscrition First </a> 
                          @endif
                       @else
                          @if($count<5)
                            <a class="btn btn-success pull-right" href="{{ url('/agentZipcode/agent-zipcode/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Area Cover') }}</a>
                           @endif         

                       @endif
                    @can('add-'.str_slug('Area Cover'))
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Area</th><th>State</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($agentzipcode as $item)
                                @if($item->agent_id != Auth::id()) @continue @endif
                                <tr>
                                    <td>{{ $loop->iteration??$item->id }}</td>
                                    <td>{{ $item->address }}</td><td>{{ $item->state }}</td>
                                    <td>
                                        @can('view-'.str_slug('AgentZipcode'))
                                            <a href="{{ url('/agentZipcode/agent-zipcode/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AgentZipcode') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('AgentZipcode'))
                                            <a href="{{ url('/agentZipcode/agent-zipcode/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AgentZipcode') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('AgentZipcode'))
                                            <form method="POST"
                                                  action="{{ url('/agentZipcode/agent-zipcode' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'AgentZipcode') }}"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="pagination-wrapper"> {!! $agentzipcode->appends(['search' => Request::get('search')])->render() !!} </div> --}}
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
