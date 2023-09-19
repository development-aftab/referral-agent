@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <style type="text/css">
              .online_personal_training_modal .modal-dialog {  height: 100%;  display: flex;  align-items: center; justify-content: center;}
.online_personal_training_modal .modal-dialog button.close { background: #835ee0; border-radius: 10px;  right: 0;  top: 0; border: 1px solid gray;}
.online_personal_plan_s4 .heha-bg-imgg { background-image:url(../images/online_personal_traning_row_bg.png);}

.online_personal_training_modal .modal-body h4{font-size:27px !important;}
.online_personal_training_modal .modal-body p.term_condition{font-size:13px !important;}
.online_personal_training_modal .modal-body input, .online_personal_training_modal .modal-body select{display:block;width:100%;height:35px;border:1px solid #666666;}
.online_personal_training_modal .modal-body label{font-size:17px;font-weight:400;color:#525252;}
.online_personal_training_modal .modal-body .card_number{position:relative;border:1px solid;padding:0 0px 0 15px;}
.online_personal_training_modal .modal-body .card_number>span{position:absolute;left:5px;top:8px;font-size:13px;opacity:0.5;}
.online_personal_training_modal .modal-body .card_number>input{border:0;}
.online_personal_training_modal .modal-body .card_number>input.card_no{width:63%;display:inline-block;}
.online_personal_training_modal .modal-body .card_number>input.mm_dd{width:20%;display:inline-block;}
.online_personal_training_modal .modal-body .card_number>input.cvc{width:15%;display:inline-block;}
.online_personal_training_modal .modal-body .btn{padding:10px 35px;background:#835ee0;border-radius:9px;margin-bottom:15px;}
.online_personal_training_modal .modal-body p.term_condition>a{color:#835ee0;}
          </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Subscription') }}</h3>
                    @can('add-'.str_slug('Subscription'))
                        <a class="btn btn-success pull-right" href="{{ url('/subscription/subscription/create') }}"><i
                                    class="icon-plus"></i> Add {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Subscription') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                     {{--    <table class="table" id="myTable">
                            <thead>
                            <tr>
                               
                                <th>Subscription</th>
                                <th>start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                                <tr>
                                    <td>{{ Auth::user()->profile->subscription }}</td>
                                    <td>{{ Auth::user()->profile->startdate }}</td> 
                                    <td>{{ Auth::user()->profile->enddate }}</td>
                                    <td>
                                        @if(Auth::user()->profile->subscription != 'basic')
                                            <a href="{{ route('Unsubscribe') }}/{{ Auth::id() }}" >
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>Unsubscribe
                                                </button>
                                            </a>
                                        @else
                                            
                                                <button type="button" class="btn btn-info btn-sm"  data-toggle="modal"data-target="#online_personal_training_payment">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> Get Subscription
                                                </button>
                                            

                                        @endif  --}}   
                                       {{--  @can('view-'.str_slug('Subscription'))
                                            <a href="{{ url('/subscription/subscription/' . $item->id) }}"
                                               title="View {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Subscription') }}">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                        @endcan

                                        @can('edit-'.str_slug('Subscription'))
                                            <a href="{{ url('/subscription/subscription/' . $item->id . '/edit') }}"
                                               title="Edit {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Subscription') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                </button>
                                            </a> --}}
                                        {{-- @endcan --}}

                                      


                       {{--              </td>
                                </tr>
                           
                            </tbody>
                        </table> --}}
                        <style>
        .memb_card_sec {
            padding: 50px 0px;
        }
        .memb_card ellipse#Ellipse_39 {
            fill: #ff6600;
        }

        .memb_card {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
            border-radius: 30px;
            padding: 0px;
            margin: 10px 0px;
            width: 351px;
            background-color: white;
            margin: 10px auto;
        }

        .card_price h5 {
            display: flex;
            justify-content: center;
            font-size: 48px;
            line-height: 12px;
        }

        .card_price h5 .d_sign {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: grey;
        }

        .head h3 {
            text-align: center;
            background-color: white;
            margin: 0;
            border-radius: 25px;
            font-size: 30px;
        }

        .card_body .card_icon {
            text-align: center;
            padding: 12px 0px 0px;
        }

        .memb_card .card_body {
            /* background-color: #ff660017; */
            background: linear-gradient(180deg, rgb(255 102 0 / 19%) 66%, rgba(255, 255, 255, 1) 70%);
            border-radius: 30px;
            padding-bottom: 120px;
        }

        .card_body {
            position: relative;
        }

        .card_body>.content {
            position: absolute;
            text-align: center;
            width: 90%;
            left: 50%;
            top: 70%;
            height: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

       .abiity ul {
            list-style-type: none;
            text-align: left;
            overflow-y: scroll;
            height: 290px;

        }

        .abiity ul li i {
            color: #ff6600;
            margin-right: 5px;
            margin-left: -18px;
        }


        .memb_card_sec .card_btn {
            background-color: #ff6600;
            color: white;
            border-radius: 10px;
            border: 1px solid;
            margin-top: 10px;
        }

        .memb_card_sec .card_btn:hover {
            border-color: #ff6600;
            background-color: transparent;
            color: #ff6600;
        }
        .card_price a{ background-color: #ff6600; color: white; border-radius: 10px; border: 1px solid; margin-top: 10px;}
        .card_price a:hover{ border-color: #ff6600; color: #ff6600; background-color: transparent}

        .memb_card .active_sign {
            position: absolute;
            width: 50px;
            height: auto;
            left: 36%;
            top: 35%;
            transform: translate(50%, -50%);
        }


    </style>
<section class="memb_card_sec sub_sec">
        <div class="container">
            <div class="row">
                 <div class="col-lg-4 col-md-12">
                    <div class="memb_cards">
                        <div class="memb_card">
                            <div class="head">
                                <h3>Basic</h3>
                            </div>
                            <div class="card_body">
                              @if(Auth::user()->profile->subscription == 'basic')  
                                <img class="active_sign" src="{{ asset('website/images/active.png') }}">
                              @endif 
                                <div class="card_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="187.279"
                                        viewBox="0 0 92.112 187.279">
                                        <g id="Group_600" data-name="Group 600"
                                            transform="translate(-1364.865 -1562.402)">
                                            <ellipse id="Ellipse_39" data-name="Ellipse 39" cx="26.236" cy="4.697"
                                                rx="26.236" ry="4.697" transform="translate(1384.848 1740.288)"
                                                fill="#4bb542"></ellipse>
                                            <path id="Path_10667" data-name="Path 10667"
                                                d="M192.815,35.027s17.649,3.662,24.288,20.236c0,0,2.711-38.625-21.784-38.625Z"
                                                transform="translate(1238.883 1608.872)" fill="#fff"></path>
                                            <path id="Path_10668" data-name="Path 10668"
                                                d="M195.76,25.383l-.557-6.894L192.815,29.51C207.8,31.369,217.1,49.746,217.1,49.746,215.718,33.941,195.76,25.383,195.76,25.383Z"
                                                transform="translate(1238.883 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_546" data-name="Group 546"
                                                transform="translate(1431.508 1624.563)">
                                                <path id="Path_10669" data-name="Path 10669"
                                                    d="M217.97,60.327l-1.6-4c-6.372-15.917-23.428-19.623-23.6-19.659l.386-1.851c.681.139,15.519,3.367,23.149,16.988-.211-6.934-1.552-20.9-8.7-28.411a16.116,16.116,0,0,0-12.144-5.1V16.4a17.958,17.958,0,0,1,13.521,5.688c10.257,10.791,9.254,32.993,9.206,33.932Z"
                                                    transform="translate(-192.767 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10670" data-name="Path 10670"
                                                d="M200.565,35.027s-17.649,3.662-24.284,20.236c0,0-1.489-38.625,21.784-38.625Z"
                                                transform="translate(1189.551 1608.872)" fill="#fff"></path>
                                            <path id="Path_10671" data-name="Path 10671"
                                                d="M197.609,25.383l.557-6.894,2.384,11.021c-14.99,1.859-24.284,20.236-24.284,20.236C177.652,33.941,197.609,25.383,197.609,25.383Z"
                                                transform="translate(1189.564 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_547" data-name="Group 547"
                                                transform="translate(1364.865 1624.563)">
                                                <path id="Path_10672" data-name="Path 10672"
                                                    d="M176.2,60.482,176.043,56c-.032-.951-.7-23.4,9.632-34.1a17.557,17.557,0,0,1,13.1-5.5v1.891a15.736,15.736,0,0,0-11.738,4.92c-7.173,7.427-8.725,21.442-9.039,28.475,7.65-13.521,22.405-16.733,23.086-16.873l.382,1.851c-.171.036-17.235,3.773-23.6,19.659Z"
                                                    transform="translate(-176.024 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10673" data-name="Path 10673"
                                                d="M204.934,1.149s-23.1,27.07-23.1,60.457a86.878,86.878,0,0,0,6.715,32.352s17.239,4.661,32.774,0a86.957,86.957,0,0,0,6.711-32.352C228.031,28.219,204.934,1.149,204.934,1.149Z"
                                                transform="translate(1206.15 1562.71)" fill="#fff"></path>
                                            <path id="Path_10674" data-name="Path 10674"
                                                d="M192.88,83.141c17.1-39.29-4.136-76.37-4.136-76.37l6.548-1.449s22.994,36.364,5.425,76.2Z"
                                                transform="translate(1226.754 1575.147)" fill="#cad7ef"></path>
                                            <path id="Path_10675" data-name="Path 10675"
                                                d="M187.5,1.38s5.182,8.936,6.185,17.6l5.326-1.664S189.623-.025,187.5,1.38Z"
                                                transform="translate(1223.037 1563.156)" fill="#cad7ef"></path>
                                            <g id="Group_548" data-name="Group 548"
                                                transform="translate(1387.035 1562.402)">
                                                <path id="Path_10676" data-name="Path 10676"
                                                    d="M206.57,98.082a73.667,73.667,0,0,1-17.561-2.118c-5.131-11.7-7.415-22.708-7.415-33.263,0-33.355,23.1-60.8,23.333-61.074l.716-.844.72.844c.235.275,23.325,27.719,23.325,61.074a87.617,87.617,0,0,1-6.774,32.7l-.239.593h-.509A55.239,55.239,0,0,1,206.57,98.082Zm-16.618-3.833c2.774.669,17.776,3.941,31.377.02A85.477,85.477,0,0,0,227.8,62.7c0-29.335-18.266-54.037-22.154-58.956-3.885,4.924-22.154,29.637-22.154,58.956A85.306,85.306,0,0,0,189.953,94.248Z"
                                                    transform="translate(-181.594 -0.783)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10677" data-name="Path 10677"
                                                d="M218.624,44.043a37.824,37.824,0,0,1-15.539,31.1,38.134,38.134,0,0,1-15.567-30.008c0-.7.036-1.091.036-1.091-2.667,1.254-5.1,6.723-5.1,6.723.605-14.062,3.964-19.786,3.964-19.786h33.343s3.359,5.724,3.968,19.786C223.727,50.766,221.291,45.3,218.624,44.043Z"
                                                transform="translate(1207.996 1651.616)" fill="#fff"></path>
                                            <path id="Path_10678" data-name="Path 10678"
                                                d="M203.174,44.043a37.824,37.824,0,0,1-15.539,31.1c12.55-15.913,9.2-40.237,9.2-40.237,2.273.8,4.514,3.562,4.514,3.562-.084-5.549-3.4-6.687-3.4-6.687l6.122-.8c.231,0,3.59,5.724,4.2,19.786C208.277,50.766,205.841,45.3,203.174,44.043Z"
                                                transform="translate(1223.445 1651.616)" fill="#cad7ef"></path>
                                            <g id="Group_549" data-name="Group 549"
                                                transform="translate(1389.285 1681.652)">
                                                <path id="Path_10679" data-name="Path 10679"
                                                    d="M203.955,77.034l-.569-.43A39.131,39.131,0,0,1,187.457,46.68a21.447,21.447,0,0,0-3.272,5.174l-2.026,4.534.215-4.959c.609-14.13,3.956-19.977,4.1-20.22l.275-.466H221.17l.275.466c.143.243,3.487,6.09,4.1,20.22l.215,4.959-2.022-4.534a21.478,21.478,0,0,0-3.288-5.19A39.456,39.456,0,0,1,204.524,76.6ZM189.5,43.2l-.135,1.636c0,.02-.028.378-.028,1.007a37.1,37.1,0,0,0,14.62,28.817,37.171,37.171,0,0,0,14.6-29.832l-.123-1.62,1.469.689a9.928,9.928,0,0,1,3.475,3.435c-.8-8.685-2.663-13.294-3.324-14.7H187.867c-.657,1.4-2.524,6.01-3.32,14.7a9.886,9.886,0,0,1,3.471-3.435Z"
                                                    transform="translate(-182.159 -30.743)" fill="#545f7f"></path>
                                            </g>
                                            <circle id="Ellipse_40" data-name="Ellipse 40" cx="10.961" cy="10.961"
                                                r="10.961" transform="translate(1400.121 1613.359)" fill="#cad7ef">
                                            </circle>
                                            <g id="Group_550" data-name="Group 550"
                                                transform="translate(1399.176 1612.415)">
                                                <path id="Path_10680" data-name="Path 10680"
                                                    d="M196.553,37.162a11.907,11.907,0,1,1,11.905-11.909A11.924,11.924,0,0,1,196.553,37.162Zm0-21.924a10.014,10.014,0,1,0,10.014,10.014A10.025,10.025,0,0,0,196.553,15.239Z"
                                                    transform="translate(-184.644 -13.348)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10681" data-name="Path 10681"
                                                d="M198.474,15.55a6.2,6.2,0,1,0-6.2,6.2A6.2,6.2,0,0,0,198.474,15.55Z"
                                                transform="translate(1218.809 1587.161)" fill="#cad7ef"></path>
                                            <g id="Group_551" data-name="Group 551"
                                                transform="translate(1403.939 1595.566)">
                                                <path id="Path_10682" data-name="Path 10682"
                                                    d="M192.986,23.4a7.145,7.145,0,1,1,7.145-7.145A7.154,7.154,0,0,1,192.986,23.4Zm0-12.395a5.25,5.25,0,1,0,5.25,5.25A5.256,5.256,0,0,0,192.986,11.01Z"
                                                    transform="translate(-185.841 -9.115)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10683" data-name="Path 10683"
                                                d="M223.983,24.466S234.24,35.452,234.24,48.909c0,0-8.9,2.75-26.648,2.75s-26.652-2.75-26.652-2.75c0-13.457,10.265-24.443,10.265-24.443s17.239,3.387,32.774,0Z"
                                                transform="translate(1203.492 1632.202)" fill="#fff"></path>
                                            <path id="Path_10684" data-name="Path 10684"
                                                d="M211.177,24.466l-4.959,1.182s8.824,13.493,8.287,19.925c0,0-10.52,4.741-29.267,5.8,0,0,23.838,1.083,36.2-2.464C221.434,48.909,218.612,31.447,211.177,24.466Z"
                                                transform="translate(1216.299 1632.202)" fill="#cad7ef"></path>
                                            <g id="Group_552" data-name="Group 552"
                                                transform="translate(1383.484 1655.641)">
                                                <path id="Path_10685" data-name="Path 10685"
                                                    d="M208.3,53.372c-17.684,0-26.561-2.675-26.931-2.79l-.669-.207v-.7c0-13.676,10.09-24.63,10.52-25.088l.358-.382.513.1c.175.036,17.239,3.308,32.392,0,1.329.74,11.412,11.69,11.412,25.366v.7l-.665.207C234.862,50.7,225.982,53.372,208.3,53.372Zm-25.7-4.414c2.384.609,11.029,2.523,25.7,2.523s23.309-1.915,25.693-2.523c-.314-11.232-7.913-20.674-9.644-22.684-13.867,2.878-29.06.513-32.081-.012C190.561,28.244,182.923,37.717,182.6,48.958Z"
                                                    transform="translate(-180.702 -24.208)" fill="#545f7f"></path>
                                            </g>
                                            <g id="Group_553" data-name="Group 553"
                                                transform="translate(1399.809 1579.569)">
                                                <path id="Path_10686" data-name="Path 10686"
                                                    d="M196.441,8.615A38.1,38.1,0,0,1,184.8,6.887l.625-1.783a37.916,37.916,0,0,0,21.7-.008l.581,1.8A36.709,36.709,0,0,1,196.441,8.615Z"
                                                    transform="translate(-184.803 -5.096)" fill="#545f7f"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="content">
                                    <div class="abiity">
                                        <ul>
                                            <li><span><i class="fal fa-check-double"></i></span> Refer Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Accept Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Choose one coverage area</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Upload limited agent information</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Utilize robust Agent Search</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Ability to contact any partner agent within site</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Market your business on site</li>
                                        </ul>
                                    </div>
                                    <div class="card_price">
                                        <h5>Free
                                            <div class="d_sign mb-4">
                                                {{-- <span>$</span>
                                                <span>only</span> --}}
                                            </div>
                                        </h5>
                                        {{-- <a href="{{ route('sign_up') }}/basic/0" class="btn card_btn">Get Start</a> --}}
                                    </div>
                                </div>
                                <div class="wave">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="351.226" height="422.211"
                                        viewBox="0 0 351.226 422.211">
                                        <path id="Path_10689" data-name="Path 10689"
                                            d="M269.766,105.789V425.757c0,15.814-13.521,28.634-30.207,28.634H-51.253c-16.685,0-30.207-12.821-30.207-28.634V32.181c13.37,0,29.526,7.746,32.722,29.164C-41,113.128-31.9,154.014,25.192,144.553c60.5-10.022,109.176,57.1,159.284-1.361C225.851,94.927,243.313,129.786,269.766,105.789Z"
                                            transform="translate(81.46 -32.181)" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 ">
                    <div class="memb_cards">
                        <div class="memb_card">
                            <div class="head">
                                <h3>Premium Monthly</h3>
                            </div>
                            <div class="card_body">
                              @if(Auth::user()->profile->subscription == 'monthly')  
                                <img class="active_sign" src="{{ asset('website/images/active.png') }}">
                              @endif  
                                <div class="card_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="92.112" height="187.279"
                                        viewBox="0 0 92.112 187.279">
                                        <g id="Group_600" data-name="Group 600"
                                            transform="translate(-1364.865 -1562.402)">
                                            <ellipse id="Ellipse_39" data-name="Ellipse 39" cx="26.236" cy="4.697"
                                                rx="26.236" ry="4.697" transform="translate(1384.848 1740.288)"
                                                fill="#4bb542"></ellipse>
                                            <path id="Path_10667" data-name="Path 10667"
                                                d="M192.815,35.027s17.649,3.662,24.288,20.236c0,0,2.711-38.625-21.784-38.625Z"
                                                transform="translate(1238.883 1608.872)" fill="#fff"></path>
                                            <path id="Path_10668" data-name="Path 10668"
                                                d="M195.76,25.383l-.557-6.894L192.815,29.51C207.8,31.369,217.1,49.746,217.1,49.746,215.718,33.941,195.76,25.383,195.76,25.383Z"
                                                transform="translate(1238.883 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_546" data-name="Group 546"
                                                transform="translate(1431.508 1624.563)">
                                                <path id="Path_10669" data-name="Path 10669"
                                                    d="M217.97,60.327l-1.6-4c-6.372-15.917-23.428-19.623-23.6-19.659l.386-1.851c.681.139,15.519,3.367,23.149,16.988-.211-6.934-1.552-20.9-8.7-28.411a16.116,16.116,0,0,0-12.144-5.1V16.4a17.958,17.958,0,0,1,13.521,5.688c10.257,10.791,9.254,32.993,9.206,33.932Z"
                                                    transform="translate(-192.767 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10670" data-name="Path 10670"
                                                d="M200.565,35.027s-17.649,3.662-24.284,20.236c0,0-1.489-38.625,21.784-38.625Z"
                                                transform="translate(1189.551 1608.872)" fill="#fff"></path>
                                            <path id="Path_10671" data-name="Path 10671"
                                                d="M197.609,25.383l.557-6.894,2.384,11.021c-14.99,1.859-24.284,20.236-24.284,20.236C177.652,33.941,197.609,25.383,197.609,25.383Z"
                                                transform="translate(1189.564 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_547" data-name="Group 547"
                                                transform="translate(1364.865 1624.563)">
                                                <path id="Path_10672" data-name="Path 10672"
                                                    d="M176.2,60.482,176.043,56c-.032-.951-.7-23.4,9.632-34.1a17.557,17.557,0,0,1,13.1-5.5v1.891a15.736,15.736,0,0,0-11.738,4.92c-7.173,7.427-8.725,21.442-9.039,28.475,7.65-13.521,22.405-16.733,23.086-16.873l.382,1.851c-.171.036-17.235,3.773-23.6,19.659Z"
                                                    transform="translate(-176.024 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10673" data-name="Path 10673"
                                                d="M204.934,1.149s-23.1,27.07-23.1,60.457a86.878,86.878,0,0,0,6.715,32.352s17.239,4.661,32.774,0a86.957,86.957,0,0,0,6.711-32.352C228.031,28.219,204.934,1.149,204.934,1.149Z"
                                                transform="translate(1206.15 1562.71)" fill="#fff"></path>
                                            <path id="Path_10674" data-name="Path 10674"
                                                d="M192.88,83.141c17.1-39.29-4.136-76.37-4.136-76.37l6.548-1.449s22.994,36.364,5.425,76.2Z"
                                                transform="translate(1226.754 1575.147)" fill="#cad7ef"></path>
                                            <path id="Path_10675" data-name="Path 10675"
                                                d="M187.5,1.38s5.182,8.936,6.185,17.6l5.326-1.664S189.623-.025,187.5,1.38Z"
                                                transform="translate(1223.037 1563.156)" fill="#cad7ef"></path>
                                            <g id="Group_548" data-name="Group 548"
                                                transform="translate(1387.035 1562.402)">
                                                <path id="Path_10676" data-name="Path 10676"
                                                    d="M206.57,98.082a73.667,73.667,0,0,1-17.561-2.118c-5.131-11.7-7.415-22.708-7.415-33.263,0-33.355,23.1-60.8,23.333-61.074l.716-.844.72.844c.235.275,23.325,27.719,23.325,61.074a87.617,87.617,0,0,1-6.774,32.7l-.239.593h-.509A55.239,55.239,0,0,1,206.57,98.082Zm-16.618-3.833c2.774.669,17.776,3.941,31.377.02A85.477,85.477,0,0,0,227.8,62.7c0-29.335-18.266-54.037-22.154-58.956-3.885,4.924-22.154,29.637-22.154,58.956A85.306,85.306,0,0,0,189.953,94.248Z"
                                                    transform="translate(-181.594 -0.783)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10677" data-name="Path 10677"
                                                d="M218.624,44.043a37.824,37.824,0,0,1-15.539,31.1,38.134,38.134,0,0,1-15.567-30.008c0-.7.036-1.091.036-1.091-2.667,1.254-5.1,6.723-5.1,6.723.605-14.062,3.964-19.786,3.964-19.786h33.343s3.359,5.724,3.968,19.786C223.727,50.766,221.291,45.3,218.624,44.043Z"
                                                transform="translate(1207.996 1651.616)" fill="#fff"></path>
                                            <path id="Path_10678" data-name="Path 10678"
                                                d="M203.174,44.043a37.824,37.824,0,0,1-15.539,31.1c12.55-15.913,9.2-40.237,9.2-40.237,2.273.8,4.514,3.562,4.514,3.562-.084-5.549-3.4-6.687-3.4-6.687l6.122-.8c.231,0,3.59,5.724,4.2,19.786C208.277,50.766,205.841,45.3,203.174,44.043Z"
                                                transform="translate(1223.445 1651.616)" fill="#cad7ef"></path>
                                            <g id="Group_549" data-name="Group 549"
                                                transform="translate(1389.285 1681.652)">
                                                <path id="Path_10679" data-name="Path 10679"
                                                    d="M203.955,77.034l-.569-.43A39.131,39.131,0,0,1,187.457,46.68a21.447,21.447,0,0,0-3.272,5.174l-2.026,4.534.215-4.959c.609-14.13,3.956-19.977,4.1-20.22l.275-.466H221.17l.275.466c.143.243,3.487,6.09,4.1,20.22l.215,4.959-2.022-4.534a21.478,21.478,0,0,0-3.288-5.19A39.456,39.456,0,0,1,204.524,76.6ZM189.5,43.2l-.135,1.636c0,.02-.028.378-.028,1.007a37.1,37.1,0,0,0,14.62,28.817,37.171,37.171,0,0,0,14.6-29.832l-.123-1.62,1.469.689a9.928,9.928,0,0,1,3.475,3.435c-.8-8.685-2.663-13.294-3.324-14.7H187.867c-.657,1.4-2.524,6.01-3.32,14.7a9.886,9.886,0,0,1,3.471-3.435Z"
                                                    transform="translate(-182.159 -30.743)" fill="#545f7f"></path>
                                            </g>
                                            <circle id="Ellipse_40" data-name="Ellipse 40" cx="10.961" cy="10.961"
                                                r="10.961" transform="translate(1400.121 1613.359)" fill="#cad7ef">
                                            </circle>
                                            <g id="Group_550" data-name="Group 550"
                                                transform="translate(1399.176 1612.415)">
                                                <path id="Path_10680" data-name="Path 10680"
                                                    d="M196.553,37.162a11.907,11.907,0,1,1,11.905-11.909A11.924,11.924,0,0,1,196.553,37.162Zm0-21.924a10.014,10.014,0,1,0,10.014,10.014A10.025,10.025,0,0,0,196.553,15.239Z"
                                                    transform="translate(-184.644 -13.348)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10681" data-name="Path 10681"
                                                d="M198.474,15.55a6.2,6.2,0,1,0-6.2,6.2A6.2,6.2,0,0,0,198.474,15.55Z"
                                                transform="translate(1218.809 1587.161)" fill="#cad7ef"></path>
                                            <g id="Group_551" data-name="Group 551"
                                                transform="translate(1403.939 1595.566)">
                                                <path id="Path_10682" data-name="Path 10682"
                                                    d="M192.986,23.4a7.145,7.145,0,1,1,7.145-7.145A7.154,7.154,0,0,1,192.986,23.4Zm0-12.395a5.25,5.25,0,1,0,5.25,5.25A5.256,5.256,0,0,0,192.986,11.01Z"
                                                    transform="translate(-185.841 -9.115)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10683" data-name="Path 10683"
                                                d="M223.983,24.466S234.24,35.452,234.24,48.909c0,0-8.9,2.75-26.648,2.75s-26.652-2.75-26.652-2.75c0-13.457,10.265-24.443,10.265-24.443s17.239,3.387,32.774,0Z"
                                                transform="translate(1203.492 1632.202)" fill="#fff"></path>
                                            <path id="Path_10684" data-name="Path 10684"
                                                d="M211.177,24.466l-4.959,1.182s8.824,13.493,8.287,19.925c0,0-10.52,4.741-29.267,5.8,0,0,23.838,1.083,36.2-2.464C221.434,48.909,218.612,31.447,211.177,24.466Z"
                                                transform="translate(1216.299 1632.202)" fill="#cad7ef"></path>
                                            <g id="Group_552" data-name="Group 552"
                                                transform="translate(1383.484 1655.641)">
                                                <path id="Path_10685" data-name="Path 10685"
                                                    d="M208.3,53.372c-17.684,0-26.561-2.675-26.931-2.79l-.669-.207v-.7c0-13.676,10.09-24.63,10.52-25.088l.358-.382.513.1c.175.036,17.239,3.308,32.392,0,1.329.74,11.412,11.69,11.412,25.366v.7l-.665.207C234.862,50.7,225.982,53.372,208.3,53.372Zm-25.7-4.414c2.384.609,11.029,2.523,25.7,2.523s23.309-1.915,25.693-2.523c-.314-11.232-7.913-20.674-9.644-22.684-13.867,2.878-29.06.513-32.081-.012C190.561,28.244,182.923,37.717,182.6,48.958Z"
                                                    transform="translate(-180.702 -24.208)" fill="#545f7f"></path>
                                            </g>
                                            <g id="Group_553" data-name="Group 553"
                                                transform="translate(1399.809 1579.569)">
                                                <path id="Path_10686" data-name="Path 10686"
                                                    d="M196.441,8.615A38.1,38.1,0,0,1,184.8,6.887l.625-1.783a37.916,37.916,0,0,0,21.7-.008l.581,1.8A36.709,36.709,0,0,1,196.441,8.615Z"
                                                    transform="translate(-184.803 -5.096)" fill="#545f7f"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="content">
                                    <div class="abiity">
                                        <ul>
                                            <li><span><i class="fal fa-check-double"></i></span>Premium members are always listed first in search results</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Choose up to 5 coverage area (You will be show within 30 miles of all coverage areas)</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Include Bio or “About Me” in profile
                                            </li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members Training/Tips/Tools</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members referral tracking </li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members referral workflow</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Refer Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Accept Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Utilize robust Agent Search</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Ability to contact any partner agent within site</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Market your business on site</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Display headshot and logo on profile</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Billed monthly, cancel anytime</li>
                                        </ul>
                                    </div>
                                    <div class="card_price">
                                        <h5>9.99
                                            <div class="d_sign">
                                                <span>$</span>
                                                <span>only</span>
                                            </div>
                                        </h5>
                                        @if(Auth::user()->profile->subscription != 'basic' && Auth::user()->profile->subscription == 'monthly')
                                            <a href="{{ route('Unsubscribe') }}/{{ Auth::id() }}" class="btn" >
                                                
                                                    Unsubscribe
                                                
                                            </a>
                                        @else
                                           <a data-price="10" class="btn card_btn">Get Start</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="wave">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="351.226" height="422.211"
                                        viewBox="0 0 351.226 422.211">
                                        <path id="Path_10689" data-name="Path 10689"
                                            d="M269.766,105.789V425.757c0,15.814-13.521,28.634-30.207,28.634H-51.253c-16.685,0-30.207-12.821-30.207-28.634V32.181c13.37,0,29.526,7.746,32.722,29.164C-41,113.128-31.9,154.014,25.192,144.553c60.5-10.022,109.176,57.1,159.284-1.361C225.851,94.927,243.313,129.786,269.766,105.789Z"
                                            transform="translate(81.46 -32.181)" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="memb_cards">
                        <div class="memb_card">
                            <div class="head">
                                <h3>Premium Anually</h3>
                            </div>
                            <div class="card_body">
                              @if(Auth::user()->profile->subscription == 'yearly')  
                                <img class="active_sign" src="{{ asset('website/images/active.png') }}">
                              @endif  
                                <div class="card_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="92.112" height="187.279"
                                        viewBox="0 0 92.112 187.279">
                                        <g id="Group_600" data-name="Group 600"
                                            transform="translate(-1364.865 -1562.402)">
                                            <ellipse id="Ellipse_39" data-name="Ellipse 39" cx="26.236" cy="4.697"
                                                rx="26.236" ry="4.697" transform="translate(1384.848 1740.288)"
                                                fill="#4bb542"></ellipse>
                                            <path id="Path_10667" data-name="Path 10667"
                                                d="M192.815,35.027s17.649,3.662,24.288,20.236c0,0,2.711-38.625-21.784-38.625Z"
                                                transform="translate(1238.883 1608.872)" fill="#fff"></path>
                                            <path id="Path_10668" data-name="Path 10668"
                                                d="M195.76,25.383l-.557-6.894L192.815,29.51C207.8,31.369,217.1,49.746,217.1,49.746,215.718,33.941,195.76,25.383,195.76,25.383Z"
                                                transform="translate(1238.883 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_546" data-name="Group 546"
                                                transform="translate(1431.508 1624.563)">
                                                <path id="Path_10669" data-name="Path 10669"
                                                    d="M217.97,60.327l-1.6-4c-6.372-15.917-23.428-19.623-23.6-19.659l.386-1.851c.681.139,15.519,3.367,23.149,16.988-.211-6.934-1.552-20.9-8.7-28.411a16.116,16.116,0,0,0-12.144-5.1V16.4a17.958,17.958,0,0,1,13.521,5.688c10.257,10.791,9.254,32.993,9.206,33.932Z"
                                                    transform="translate(-192.767 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10670" data-name="Path 10670"
                                                d="M200.565,35.027s-17.649,3.662-24.284,20.236c0,0-1.489-38.625,21.784-38.625Z"
                                                transform="translate(1189.551 1608.872)" fill="#fff"></path>
                                            <path id="Path_10671" data-name="Path 10671"
                                                d="M197.609,25.383l.557-6.894,2.384,11.021c-14.99,1.859-24.284,20.236-24.284,20.236C177.652,33.941,197.609,25.383,197.609,25.383Z"
                                                transform="translate(1189.564 1614.389)" fill="#cad7ef"></path>
                                            <g id="Group_547" data-name="Group 547"
                                                transform="translate(1364.865 1624.563)">
                                                <path id="Path_10672" data-name="Path 10672"
                                                    d="M176.2,60.482,176.043,56c-.032-.951-.7-23.4,9.632-34.1a17.557,17.557,0,0,1,13.1-5.5v1.891a15.736,15.736,0,0,0-11.738,4.92c-7.173,7.427-8.725,21.442-9.039,28.475,7.65-13.521,22.405-16.733,23.086-16.873l.382,1.851c-.171.036-17.235,3.773-23.6,19.659Z"
                                                    transform="translate(-176.024 -16.4)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10673" data-name="Path 10673"
                                                d="M204.934,1.149s-23.1,27.07-23.1,60.457a86.878,86.878,0,0,0,6.715,32.352s17.239,4.661,32.774,0a86.957,86.957,0,0,0,6.711-32.352C228.031,28.219,204.934,1.149,204.934,1.149Z"
                                                transform="translate(1206.15 1562.71)" fill="#fff"></path>
                                            <path id="Path_10674" data-name="Path 10674"
                                                d="M192.88,83.141c17.1-39.29-4.136-76.37-4.136-76.37l6.548-1.449s22.994,36.364,5.425,76.2Z"
                                                transform="translate(1226.754 1575.147)" fill="#cad7ef"></path>
                                            <path id="Path_10675" data-name="Path 10675"
                                                d="M187.5,1.38s5.182,8.936,6.185,17.6l5.326-1.664S189.623-.025,187.5,1.38Z"
                                                transform="translate(1223.037 1563.156)" fill="#cad7ef"></path>
                                            <g id="Group_548" data-name="Group 548"
                                                transform="translate(1387.035 1562.402)">
                                                <path id="Path_10676" data-name="Path 10676"
                                                    d="M206.57,98.082a73.667,73.667,0,0,1-17.561-2.118c-5.131-11.7-7.415-22.708-7.415-33.263,0-33.355,23.1-60.8,23.333-61.074l.716-.844.72.844c.235.275,23.325,27.719,23.325,61.074a87.617,87.617,0,0,1-6.774,32.7l-.239.593h-.509A55.239,55.239,0,0,1,206.57,98.082Zm-16.618-3.833c2.774.669,17.776,3.941,31.377.02A85.477,85.477,0,0,0,227.8,62.7c0-29.335-18.266-54.037-22.154-58.956-3.885,4.924-22.154,29.637-22.154,58.956A85.306,85.306,0,0,0,189.953,94.248Z"
                                                    transform="translate(-181.594 -0.783)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10677" data-name="Path 10677"
                                                d="M218.624,44.043a37.824,37.824,0,0,1-15.539,31.1,38.134,38.134,0,0,1-15.567-30.008c0-.7.036-1.091.036-1.091-2.667,1.254-5.1,6.723-5.1,6.723.605-14.062,3.964-19.786,3.964-19.786h33.343s3.359,5.724,3.968,19.786C223.727,50.766,221.291,45.3,218.624,44.043Z"
                                                transform="translate(1207.996 1651.616)" fill="#fff"></path>
                                            <path id="Path_10678" data-name="Path 10678"
                                                d="M203.174,44.043a37.824,37.824,0,0,1-15.539,31.1c12.55-15.913,9.2-40.237,9.2-40.237,2.273.8,4.514,3.562,4.514,3.562-.084-5.549-3.4-6.687-3.4-6.687l6.122-.8c.231,0,3.59,5.724,4.2,19.786C208.277,50.766,205.841,45.3,203.174,44.043Z"
                                                transform="translate(1223.445 1651.616)" fill="#cad7ef"></path>
                                            <g id="Group_549" data-name="Group 549"
                                                transform="translate(1389.285 1681.652)">
                                                <path id="Path_10679" data-name="Path 10679"
                                                    d="M203.955,77.034l-.569-.43A39.131,39.131,0,0,1,187.457,46.68a21.447,21.447,0,0,0-3.272,5.174l-2.026,4.534.215-4.959c.609-14.13,3.956-19.977,4.1-20.22l.275-.466H221.17l.275.466c.143.243,3.487,6.09,4.1,20.22l.215,4.959-2.022-4.534a21.478,21.478,0,0,0-3.288-5.19A39.456,39.456,0,0,1,204.524,76.6ZM189.5,43.2l-.135,1.636c0,.02-.028.378-.028,1.007a37.1,37.1,0,0,0,14.62,28.817,37.171,37.171,0,0,0,14.6-29.832l-.123-1.62,1.469.689a9.928,9.928,0,0,1,3.475,3.435c-.8-8.685-2.663-13.294-3.324-14.7H187.867c-.657,1.4-2.524,6.01-3.32,14.7a9.886,9.886,0,0,1,3.471-3.435Z"
                                                    transform="translate(-182.159 -30.743)" fill="#545f7f"></path>
                                            </g>
                                            <circle id="Ellipse_40" data-name="Ellipse 40" cx="10.961" cy="10.961"
                                                r="10.961" transform="translate(1400.121 1613.359)" fill="#cad7ef">
                                            </circle>
                                            <g id="Group_550" data-name="Group 550"
                                                transform="translate(1399.176 1612.415)">
                                                <path id="Path_10680" data-name="Path 10680"
                                                    d="M196.553,37.162a11.907,11.907,0,1,1,11.905-11.909A11.924,11.924,0,0,1,196.553,37.162Zm0-21.924a10.014,10.014,0,1,0,10.014,10.014A10.025,10.025,0,0,0,196.553,15.239Z"
                                                    transform="translate(-184.644 -13.348)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10681" data-name="Path 10681"
                                                d="M198.474,15.55a6.2,6.2,0,1,0-6.2,6.2A6.2,6.2,0,0,0,198.474,15.55Z"
                                                transform="translate(1218.809 1587.161)" fill="#cad7ef"></path>
                                            <g id="Group_551" data-name="Group 551"
                                                transform="translate(1403.939 1595.566)">
                                                <path id="Path_10682" data-name="Path 10682"
                                                    d="M192.986,23.4a7.145,7.145,0,1,1,7.145-7.145A7.154,7.154,0,0,1,192.986,23.4Zm0-12.395a5.25,5.25,0,1,0,5.25,5.25A5.256,5.256,0,0,0,192.986,11.01Z"
                                                    transform="translate(-185.841 -9.115)" fill="#545f7f"></path>
                                            </g>
                                            <path id="Path_10683" data-name="Path 10683"
                                                d="M223.983,24.466S234.24,35.452,234.24,48.909c0,0-8.9,2.75-26.648,2.75s-26.652-2.75-26.652-2.75c0-13.457,10.265-24.443,10.265-24.443s17.239,3.387,32.774,0Z"
                                                transform="translate(1203.492 1632.202)" fill="#fff"></path>
                                            <path id="Path_10684" data-name="Path 10684"
                                                d="M211.177,24.466l-4.959,1.182s8.824,13.493,8.287,19.925c0,0-10.52,4.741-29.267,5.8,0,0,23.838,1.083,36.2-2.464C221.434,48.909,218.612,31.447,211.177,24.466Z"
                                                transform="translate(1216.299 1632.202)" fill="#cad7ef"></path>
                                            <g id="Group_552" data-name="Group 552"
                                                transform="translate(1383.484 1655.641)">
                                                <path id="Path_10685" data-name="Path 10685"
                                                    d="M208.3,53.372c-17.684,0-26.561-2.675-26.931-2.79l-.669-.207v-.7c0-13.676,10.09-24.63,10.52-25.088l.358-.382.513.1c.175.036,17.239,3.308,32.392,0,1.329.74,11.412,11.69,11.412,25.366v.7l-.665.207C234.862,50.7,225.982,53.372,208.3,53.372Zm-25.7-4.414c2.384.609,11.029,2.523,25.7,2.523s23.309-1.915,25.693-2.523c-.314-11.232-7.913-20.674-9.644-22.684-13.867,2.878-29.06.513-32.081-.012C190.561,28.244,182.923,37.717,182.6,48.958Z"
                                                    transform="translate(-180.702 -24.208)" fill="#545f7f"></path>
                                            </g>
                                            <g id="Group_553" data-name="Group 553"
                                                transform="translate(1399.809 1579.569)">
                                                <path id="Path_10686" data-name="Path 10686"
                                                    d="M196.441,8.615A38.1,38.1,0,0,1,184.8,6.887l.625-1.783a37.916,37.916,0,0,0,21.7-.008l.581,1.8A36.709,36.709,0,0,1,196.441,8.615Z"
                                                    transform="translate(-184.803 -5.096)" fill="#545f7f"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="content">
                                    <div class="abiity">
                                        <ul>
                                            <li><span><i class="fal fa-check-double"></i></span>Premium members are always listed first in search results</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Choose up to 5 coverage area (You will be show within 30 miles of all coverage areas)</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Include Bio or “About Me” in profile
                                            </li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members Training/Tips/Tools</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members referral tracking </li>
                                            <li><span><i class="fal fa-check-double"></i></span>Access to Premium Members referral workflow</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Refer Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Accept Leads</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Utilize robust Agent Search</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Ability to contact any partner agent within site</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Market your business on site</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Display headshot and logo on profile</li>
                                            <li><span><i class="fal fa-check-double"></i></span>Billed monthly, cancel anytime</li>
                                        </ul>
                                    </div>
                                    <div class="card_price">
                                        <h5>99.99
                                            <div class="d_sign">
                                                <span>$</span>
                                                <span>only</span>
                                            </div>
                                        </h5>
                                         @if(Auth::user()->profile->subscription != 'basic' && Auth::user()->profile->subscription == 'yearly')
                                            <a href="{{ route('Unsubscribe') }}/{{ Auth::id() }}" class="btn card_btn" >
                                               
                                                    Unsubscribe
                                                
                                            </a>
                                        @else
                                          <a data-price="100" class="btn card_btn">Get Start</a>
                                        @endif  
                                    </div>
                                </div>
                                <div class="wave">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="351.226" height="422.211"
                                        viewBox="0 0 351.226 422.211">
                                        <path id="Path_10689" data-name="Path 10689"
                                            d="M269.766,105.789V425.757c0,15.814-13.521,28.634-30.207,28.634H-51.253c-16.685,0-30.207-12.821-30.207-28.634V32.181c13.37,0,29.526,7.746,32.722,29.164C-41,113.128-31.9,154.014,25.192,144.553c60.5-10.022,109.176,57.1,159.284-1.361C225.851,94.927,243.313,129.786,269.766,105.789Z"
                                            transform="translate(81.46 -32.181)" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade online_personal_training_modal" id="online_personal_training_payment" tabindex="-1" role="dialog" aria-labelledby="online_personal_training_paymentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
        <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('get_subscribe') }}"enctype="multipart/form-data">
            {{csrf_field()}}   
            <div class="form-group">
                 <span style="color: red" ></span>
                <input type="email" class="form-control" id="email" name="strip_email" placeholder="Email*">
            </div>
            <input type="hidden" name="price" id="subcription">
            {{-- <div class="form-group">
                    <select class="form-control" name="price" id="subcription">
                       
                       <option value="99">Yearly $99</option>
                       <option value="10">Monthly $10</option>
                   </select>  
            </div> --}}
            <div><small>type: <strong id="ccnum-type"></strong></small></div>
            <div class="form-group card_number">
                <span><i class="far fa-credit-card"></i></span>
                <input type="text" class="form-control card_no" name="card_number" id="ccnum_input" placeholder="Card Number">
                <input type="text" class="form-control mm_dd" name="card_expiry" id="expiry_input" placeholder="MM/YY">
                <input type="text" class="form-control cvc" name="cvv" id="cvc_input" placeholder="CVC">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Subscribe</button>
            <div id="result" class="emoji valid"></div>
           
            <img src="{{ asset('website') }}/images/powered by.png" alt="powered by image">
        </form>
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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>
    <script src="{{asset('js/payform/dist/payform.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('js/payform/dist/jquery.payform.min.js')}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">    
   
   

    (function() {
         // var type    = document.getElementById('ccnum-type'),
         //        expiry      = document.getElementById('expiry_input'),
         //        cvc         = document.getElementById('cvc_input'),
         //        card_Number = document.getElementById('ccnum_input'),
         //        //submit    = document.getElementById('submit'),
         //        result      = document.getElementById('result'),
         //        expiryDate = document.getElementById('expiry-date');
  var ccnum  = document.getElementById('ccnum_input'),
      type   = document.getElementById('ccnum-type'),
      expiry = document.getElementById('expiry_input'),
      cvc    = document.getElementById('cvc_input'),
      submit = document.getElementById('submit'),
      result = document.getElementById('result');

  payform.cardNumberInput(ccnum);
  payform.expiryInput(expiry);
  payform.cvcInput(cvc);

  ccnum.addEventListener('input',   updateType);

  submit.addEventListener('click', function() {

    var valid     = [],
        expiryObj = payform.parseCardExpiry(expiry.value);

    valid.push(fieldStatus(ccnum,  payform.validateCardNumber(ccnum.value)));
    valid.push(fieldStatus(expiry, payform.validateCardExpiry(expiryObj)));
    valid.push(fieldStatus(cvc,    payform.validateCardCVC(cvc.value, type.innerHTML)));

    result.className = 'emoji ' + (valid.every(Boolean) ? 'valid' : 'invalid');

//     if(jQuery.inArray(false, valid) != -1) {
//     swal('OOPS','card invalid','error');
// } else {
//     $('#card_types').val($('#ccnum-type').html());
//    swal({
//        title: "Checking...",
//        text: "Please wait",
//        imageUrl: "images/ajaxloader.gif",
//        showConfirmButton: false,
//        allowOutsideClick: false,
//        allowEscapeKey: false
//     });                                 

// } 


  });

  function updateType(e) {
    var cardType = payform.parseCardType(e.target.value);
    type.innerHTML = cardType || 'invalid';
  }


  function fieldStatus(input, valid) {
    if (valid) {
      removeClass(input.parentNode, 'error');
    } else {
      addClass(input.parentNode, 'error');
    }
    return valid;
  }

  function addClass(ele, _class) {
    if (ele.className.indexOf(_class) === -1) {
      ele.className += ' ' + _class;
    }
  }

  function removeClass(ele, _class) {
    if (ele.className.indexOf(_class) !== -1) {
      ele.className = ele.className.replace(_class, '');
    }
  }
})();
$(document).on('click','.card_btn',function(e){
     price =  $(this).attr('data-price');
     $('#subcription').val(price)
     $('#online_personal_training_payment').modal('show');
});  
</script>

@endpush
