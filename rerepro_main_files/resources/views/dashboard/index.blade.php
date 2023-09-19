@extends('layouts.master')

@push('css')


@endpush

@section('content')
    @if(auth()->user()->hasRole('admin'))
        <div class="row m-0">

            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf bg-primary text-white"><i
                                    class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count text-blue">154</h3>
                        <p class="info-text font-12">Bookings</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">Target<span class="label label-rounded label-success">300</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf bg-primary text-white"><i class="mdi mdi-comment-text-outline"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count text-blue">68</h3>
                        <p class="info-text font-12">Complaints</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">Total Pending<span
                                    class="label label-rounded label-danger">154</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-box">
                <div class="media">
                    <div class="media-left">
                        <span class="icoleaf bg-primary text-white"><i class="mdi mdi-coin"></i></span>
                    </div>
                    <div class="media-body">
                        <h3 class="info-count text-blue">&#36;9475</h3>
                        <p class="info-text font-12">Earning</p>
                        <span class="hr-line"></span>
                        <p class="info-ot font-15">March : <span class="text-blue font-semibold">&#36;514578</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 info-box b-r-0">
                <div class="media">
                    <div class="media-left p-r-5">
                        <div id="earning" class="e" data-percent="60">
                            <div id="pending" class="p" data-percent="55"></div>
                            <div id="booking" class="b" data-percent="50"></div>
                        </div>
                    </div>
                    <div class="media-body">
                        <h2 class="text-blue font-22 m-t-0">Report</h2>
                        <ul class="p-0 m-b-20">
                            <li><i class="fa fa-circle m-r-5 text-primary"></i>60% Earnings</li>
                            <li><i class="fa fa-circle m-r-5 text-primary"></i>55% Pending</li>
                            <li><i class="fa fa-circle m-r-5 text-info"></i>50% Bookings</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="white-box stat-widget">
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <h4 class="box-title">Statistics</h4>
                            </div>
                            <div class="col-md-9 col-sm-9">
                                <select class="custom-select">
                                    <option selected value="0">Feb 04 - Mar 03</option>
                                    <option value="1">Mar 04 - Apr 03</option>
                                    <option value="2">Apr 04 - May 03</option>
                                    <option value="3">May 04 - Jun 03</option>
                                </select>
                                <ul class="list-inline">
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>New Sales
                                        </h6>
                                    </li>
                                    <li>
                                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>Existing
                                            Sales</h6>
                                    </li>
                                </ul>
                            </div>
                            <div class="stat chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="white-box">
                        <h4 class="box-title">Task Progress</h4>
                        <div class="task-widget t-a-c">
                            <div class="task-chart" id="sparklinedashdb"></div>
                            <div class="task-content font-16 t-a-c">
                                <div class="col-sm-6 b-r">
                                    Urgent Tasks
                                    <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                                <div class="col-sm-6">
                                    Normal Tasks
                                    <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                                </div>
                            </div>
                            <div class="task-assign font-16">
                                Assigned To
                                <ul class="list-inline">
                                    <li class="p-l-0">
                                        <img src="{{asset('plugins/images/users/1.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="{{asset('plugins/images/users/2.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li>
                                        <img src="{{asset('plugins/images/users/3.png')}}" alt="user"
                                             data-toggle="tooltip"
                                             data-placement="top" title="" data-original-title="Steave">
                                    </li>
                                    <li class="p-r-0">
                                        <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="white-box bg-primary color-box">
                        <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                        <div class="ct-revenue chart-pos"></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-success color-box">
                        <h1 class="text-white font-light m-b-0">5247</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">current visits</p>
                        <h6 class="text-white font-semibold">+25% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <div class="ct-visit chart-pos"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="white-box bg-danger color-box">
                        <h1 class="text-white font-light m-b-0">25%</h1>
                        <span class="hr-line"></span>
                        <p class="cb-text">Finished Tasks</p>
                        <h6 class="text-white font-semibold">+15% <span class="font-light">Last Week</span></h6>
                        <div class="chart">
                            <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a"
                                   data-fgColor="#ffffff" data-displayInput=false data-width="96" data-height="96"
                                   data-thickness=".1" value="25" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box user-table">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="box-title">Table Format/User Data</h4>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-inline">
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="btn btn-default btn-outline font-16"><i
                                                    class="fa fa-commenting" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                                <select class="custom-select">
                                    <option selected>Sort by</option>
                                    <option value="1">Name</option>
                                    <option value="2">Location</option>
                                    <option value="3">Type</option>
                                    <option value="4">Role</option>
                                    <option value="5">Action</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c2" type="checkbox">
                                            <label for="c2"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Daniel Kristeen</a></td>
                                    <td>Texas, US</td>
                                    <td>Posts 564</td>
                                    <td><span class="label label-success">Admin</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c3" type="checkbox">
                                            <label for="c3"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Hanna Gover</a></td>
                                    <td>Los Angeles, US</td>
                                    <td>Posts 451</td>
                                    <td><span class="label label-info">Staff</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c4" type="checkbox">
                                            <label for="c4"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Jeffery Brown</a></td>
                                    <td>Houston, US</td>
                                    <td>Posts 978</td>
                                    <td><span class="label label-danger">User</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c5" type="checkbox">
                                            <label for="c5"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Elliot Dugteren</a></td>
                                    <td>San Antonio, US</td>
                                    <td>Posts 34</td>
                                    <td><span class="label label-warning">General</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="checkbox checkbox-info">
                                            <input id="c6" type="checkbox">
                                            <label for="c6"></label>
                                        </div>
                                    </td>
                                    <td><a href="javascript:void(0);" class="text-link">Sergio Milardovich</a></td>
                                    <td>Jacksonville, US</td>
                                    <td>Posts 31</td>
                                    <td><span class="label label-primary">Partial</span></td>
                                    <td>
                                        <select class="custom-select">
                                            <option value="1">Modulator</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Staff</option>
                                            <option value="4">User</option>
                                            <option value="5">General</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination">
                            <li class="disabled"><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                        </ul>
                        <a href="javascript:void(0);" class="btn btn-success pull-right m-t-10 font-20">+</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="white-box">
                        <div class="task-widget2">
                            <div class="task-image">
                                <img src="{{asset('plugins/images/task.jpg')}}" alt="task" class="img-responsive">
                                <div class="task-image-overlay"></div>
                                <div class="task-detail">
                                    <h2 class="font-light text-white m-b-0">07 April</h2>
                                    <h4 class="font-normal text-white m-t-5">Your tasks for today</h4>
                                </div>
                                <div class="task-add-btn">
                                    <a href="javascript:void(0);" class="btn btn-success">+</a>
                                </div>
                            </div>
                            <div class="task-total">
                                <p class="font-16 m-b-0"><strong>5</strong> Tasks for <a href="javascript:void(0);"
                                                                                         class="text-link">Jon Doe</a>
                                </p>
                            </div>
                            <div class="task-list">
                                <ul class="list-group">
                                    <li class="list-group-item bl-info">
                                        <div class="checkbox checkbox-success">
                                            <input id="c7" type="checkbox">
                                            <label for="c7">
                                                <span class="font-16">Create invoice for customers and email each customers.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-warning">
                                        <div class="checkbox checkbox-success">
                                            <input id="c8" type="checkbox" checked>
                                            <label for="c8">
                                                <span class="font-16">Send payment of <strong>&#36;500 invoised</strong> on 23 May to <a
                                                            href="javascript:void(0);"
                                                            class="text-link">Daniel Kristeen</a> via paypal.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">03:00 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-danger">
                                        <div class="checkbox checkbox-success">
                                            <input id="c9" type="checkbox">
                                            <label for="c9">
                                                <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">04:45 PM</h6>
                                        </div>
                                    </li>
                                    <li class="list-group-item bl-success">
                                        <div class="checkbox checkbox-success">
                                            <input id="c10" type="checkbox">
                                            <label for="c10">
                                                <span class="font-16">It is a long established fact that a reader will be distracted by the readable.</span>
                                            </label>
                                            <h6 class="p-l-30 font-bold">05:30 PM</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="task-loadmore">
                                <a href="javascript:void(0);" class="btn btn-default btn-outline btn-rounded">Load
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="white-box chat-widget">
                        <a href="javascript:void(0);" class="pull-right"><i class="icon-settings"></i></a>
                        <h4 class="box-title">Chat</h4>
                        <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="{{asset('plugins/images/users/hanna.jpg')}}"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Hey Daniel, This is just a
                                            sample chat. </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> buddy </p>
                                    </div>
                                    <span>2 Min ago</span>
                                </div>
                            </li>
                            <li>
                                <div class="chat-image"><img alt="male"
                                                             src="{{asset('plugins/images/users/hanna.jpg')}}"></div>
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p><span class="font-semibold">Hanna Gover</span> Bye now. </p>
                                    </div>
                                    <span>1 Min ago</span>
                                </div>
                            </li>
                            <li class="odd">
                                <div class="chat-body">
                                    <div class="chat-text">
                                        <p> We have been busy all the day to make your website proposal and finally came
                                            with the super excited offer. </p>
                                    </div>
                                    <span>5 Sec ago</span>
                                </div>
                            </li>
                        </ul>
                        <div class="chat-send">
                            <input type="text" class="form-control" placeholder="Write your message">
                            <i class="fa fa-camera"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== Right-Sidebar ===== -->
        {{--@include('layouts.partials.right-sidebar')--}}
        <!-- ===== Right-Sidebar-End ===== -->
        </div>
    @else
        @if(Auth::user()->hasRole('agent'))
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <h1 align="center">Welcome to Dashboard</h1>
                            </div> --}}

                    <div class="col-md-12 col-lg-6 col-sm-12 inner_section_topLeftbox">
                        <div class="inner_section_topLeftCol">
                            <div class="top_heading">
                                {{-- <h1>Splash yourself in Big Discount on This Sale.</h1> --}}
                            </div>
                            {{-- <div class="middle_contant">
                                <p>Lorem Ipsum is simply dummy text of the printing
                                    and typesetting industry. </p>
                            </div> --}}
                            <div class="bottom_link">
                                {{-- <a href="#!">EXPLORE NOW</a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="inner_section_topRightCol row">
                            {{-- <div class="col-md-3 col-lg-3 col-sm-6 dash_card">
                                <div class="inner_section_card">
                                    <div class="top_icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="card_title">
                                        <h6>View by people</h6>
                                    </div>
                                    <div class="card_subTitle">
                                        <p>Robin Thicke</p>
                                    </div>
                                    <div class="card_figures">
                                        <span class="digits">3,137</span>
                                    </div>
                                    <div class="stats">
                                        <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                <div class="inner_section_card">
                                    <div class="top_icon">
                                        {{-- <i class="fas fa-envelope"></i> --}}
                                        <img src="{{ asset('website/images/lead.svg') }}">
                                    </div>
                                    {{-- <div class="card_title">
                                        <h6>04</h6>
                                    </div> --}}
                                    <div class="card_figures">
                                        <span class="digits">{{ $receviedcount }}</span>
                                    </div>
                                    <div class="card_subTitle">
                                        <p>Received</p>
                                    </div>
                                    {{-- <div class="card_figures">
                                        <span class="digits">3,137</span>
                                    </div>
                                    <div class="stats">
                                        <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                <div class="inner_section_card">
                                    <div class="top_icon">
                                        {{-- <i class="fas fa-calendar-week"></i> --}}
                                        <img src="{{ asset('website/images/aggrement.svg') }}">
                                    </div>
                                    {{-- <div class="card_title">
                                        <h6>View by people</h6>
                                    </div> --}}
                                    <div class="card_figures">
                                        <span class="digits">{{ $pending }}</span>
                                    </div>
                                    <div class="card_subTitle">
                                        <p>Pending</p>
                                    </div>                        
                                    {{-- <div class="stats">
                                        <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                <div class="inner_section_card">
                                    <div class="top_icon">
                                        {{-- <i class="fas fa-calendar-week"></i> --}}
                                        <img src="{{ asset('website/images/subscrition.svg') }}">
                                    </div>
                                    {{-- <div class="card_title">
                                        <h6>View by people</h6>
                                    </div> --}}
                                    <div class="card_figures">
                                        <span class="digits">@if(isset(Auth::user()->profile->subscription) && Auth::user()->profile->subscription == "yearly") YEARLY @elseif(Auth::user()->profile->subscription== "monthly") MONTHLY @elseif(Auth::user()->profile->subscription == "basic") BASIC @endif</span>
                                    </div>
                                    <div class="card_subTitle">
                                     @if(isset(Auth::user()->profile->subscription) && Auth::user()->profile->subscription != "basic")
                                        
                                     @if(isset(Auth::user()->profile->enddate))   <p>RENEWS {{ Carbon\Carbon::parse(Auth::user()->profile->enddate)->addDays(1)->format("d/m/Y") }}</p> @endif
                                     @else  
                                     <p>Subscription </p>
                                     @endif 
                                    </div>                        
                                    {{-- <div class="stats">
                                        <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 main_right_col">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="inner_section_table">
                                    <div class="top_header">
                                        <div class="heading">
                                            <h4>Received Leads Requests</h4>
                                        </div>
                                        {{-- <div class="view_all_btn">
                                            <a href="#!">View All <i class="fas fa-chevron-down"></i></a>
                                        </div> --}}
                                    </div>
                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                        <table class="table-responsive table_leadsRequests">
                                            <thead>
                                                <tr>
                                                   
                                                    <th>Location</th>
                                                    <th>Status</th>
                                                    {{-- <th>Share by</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reqagreement as $element)
                                                    <tr>
                                                        <td>
                                                            <div class="notification_location">
                                                          You Have New Request In {{ $element->location }}
                                                          </div>
                                                        </td>
                                                        
                                                        <td>
                                                            @if($element->receiver_sing == 0 && $element->status == 0)
                                                                <a href="{{ route('lead_recever_accept') }}/{{ $element->id }}" class="status_btn status_closed btn_acceptRequest">
                                                                                    <i class="fa fa-check" aria-hidden="true"></i> accept
                                                                </a>
                                                                <a href="{{ route('lead_recever_reject') }}/{{ $element->id }}" class="status_btn status_closed btn_rejectRequest">
                                                                                    <i class="fa fa-times" aria-hidden="true"></i> Reject
                                                                </a>
                                                            @endif 
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <nav data-pagination class="table_pagination">
                                        <a href=# disabled><i class="fas fa-chevron-left"></i></a>
                                        <ul>
                                            <li class=current><a href=#1>1</a>
                                            <li><a href=#2>2</a>
                                            <li><a href=#3>3</a>
                                            <li><a href=#4>4</a>
                                            <li><a href=#5>5</a>
                                            <li><a href=#6>6</a>
                                            <li><a href=#7>7</a>
                                            <li><a href=#8>8</a>
                                            <li><a href=#9>9</a>
                                            <li><a href=#10>…</a>
                                            <li><a href=#41>41</a>
                                        </ul>
                                        <a href=#2><i class="fas fa-chevron-right"></i></a>
                                    </nav> --}}
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="inner_section_swipper">
                                    <div class="main_heading">
                                        <h3>My Referals Agreements</h3>
                                    </div>
                                    <!-- Swiper -->
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">
                                         @if(count($referalagreement) != 0)
                                            @foreach ($referalagreement as $key=>$element)
                                            <div class="swiper-slide">
                                          <a href="{{ route('get_certificate') }}/{{ $element->id }}">
                                                <div class="inner_slide">
                                                    <div class="main_image">
                                                        @if($element->receiver_id == Auth::id())                                
                                                            <img src="{{ asset('website') }}/{{ $element->GetSender->profile->logo??'' }}">
                                                        @else
                                                            <img src="{{ asset('website') }}/{{ $element->GetReceiver->profile->logo??'' }}">
                                                        @endif
                                                    </div>
                                                    <div class="right_details">
                                                        <div class="name content">
                                                            <i class="fas fa-user-tie"></i>
                                                        @if($element->receiver_id == Auth::id()) 
                                                            <span>{{ $element->GetSender->name??'' }}</span>
                                                        @else
                                                             <span>{{ $element->GetReceiver->name??'' }}</span>
                                                        @endif    
                                                        </div>
                                                        <div class="brokerage content">
                                                            <i class="fas fa-briefcase"></i>
                                                        @if($element->receiver_id == Auth::id()) 
                                                            <span>{{ $element->GetSender->profile->brokerage_company??'' }}</span>
                                                        @else
                                                             <span>{{ $element->GetReceiver->profile->brokerage_company??'' }}</span>
                                                        @endif 
                                                            
                                                        </div>
                                                        <div class="email content">
                                                            <i class="fas fa-briefcase"></i>
                                                        @if($element->receiver_id == Auth::id()) 
                                                            <span>{{ $element->GetSender->email??'' }}</span>
                                                        @else
                                                             <span>{{ $element->GetReceiver->email??'' }}</span>
                                                        @endif  
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>    
                                            </div>
                                           @endforeach
                                         @else
                                                <div>
                                                    <h5>NO DATA</h5>
                                                </div>
                                         @endif

                                        </div>
                                    </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 main_left_col">
                        <div class="inner_section_right_detailCol">
                            <div class="top_details">
                                <div class="main_image">
                                    <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic??'')}}">
                                </div>
                                <div class="User_name">
                                    <h3>{{ Auth::user()->name??'' }}</h3>
                                </div>
                               {{--  <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div> --}}
                            </div>
                            <div class="user_details">
                                <table>
                                    <tbody>
                                        
                                        <tr>
                                            <th>Phone:&nbsp;</th>
                                            <td>{{ Auth::user()->profile->phone??'' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:&nbsp;</th>
                                            <td>{{ Auth::user()->email??'' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Website:&nbsp;</th>
                                            <td>{{ Auth::user()->profile->agent_website??'' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Brokerage: &nbsp;</th>
                                            <td>{{ Auth::user()->profile->brokerage_company??'' }}</td>
                                        </tr>
                                        <tr>
                                            <th>License:&nbsp;</th>
                                            <td>{{ Auth::user()->profile->license_number??'' }}</td>
                                        </tr>
                                        <tr>
                                            <th>State:&nbsp;</th>
                                            <td>{{ Auth::user()->profile->state??'' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--<div class="social_icons">--}}
                                {{--<div class="icon">--}}
                                    {{--<a href="#!">--}}
                                        {{--<i class="fab fa-facebook-f"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="icon">--}}
                                    {{--<a href="#!">--}}
                                        {{--<i class="fab fa-twitter"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="icon">--}}
                                    {{--<a href="#!">--}}
                                        {{--<i class="fab fa-linkedin-in"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        @else
                <div class="container-fluid">
                    <div class="row">
                        {{-- <div class="col-md-8 col-md-offset-2 col-sm-12">
                                    <h1 align="center">Welcome to Dashboard</h1>
                                </div> --}}

                        <div class="col-md-12 col-lg-6 col-sm-12 inner_section_topLeftbox">
                            <div class="inner_section_topLeftCol">
                                <div class="top_heading">
                                    {{-- <h1>Splash yourself in Big Discount on This Sale.</h1> --}}
                                </div>
                                {{-- <div class="middle_contant">
                                    <p>Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. </p>
                                </div> --}}
                                <div class="bottom_link">
                                    {{-- <a href="#!">EXPLORE NOW</a> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 col-sm-12">
                            <div class="inner_section_topRightCol row">

                                {{-- <div class="col-md-3 col-lg-3 col-sm-6 dash_card">
                                    <div class="inner_section_card">
                                        <div class="top_icon">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <div class="card_title">
                                            <h6>View by people</h6>
                                        </div>
                                        <div class="card_subTitle">
                                            <p>Robin Thicke</p>
                                        </div>
                                        <div class="card_figures">
                                            <span class="digits">3,137</span>
                                        </div>
                                        <div class="stats">
                                            <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                    <div class="inner_section_card">
                                        <div class="top_icon">
                                            {{-- <i class="fas fa-envelope"></i> --}}
                                            <img src="{{ asset('website/images/aggrement.svg') }}">
                                        </div>
                                        {{-- <div class="card_title">
                                            <h6>04</h6>
                                        </div> --}}
                                        <div class="card_figures">
                                            <span class="digits">{{ $receviedcount }}</span>
                                        </div>
                                        <div class="card_subTitle">
                                            <p>Referal Agreements</p>
                                        </div>
                                        {{-- <div class="card_figures">
                                            <span class="digits">3,137</span>
                                        </div>
                                        <div class="stats">
                                            <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                    <div class="inner_section_card">
                                        <div class="top_icon">
                                            {{-- <i class="fas fa-calendar-week"></i> --}}
                                            <img src="{{ asset('website/images/aggrement.svg') }}">
                                        </div>
                                        {{-- <div class="card_title">
                                            <h6>View by people</h6>
                                        </div> --}}
                                        <div class="card_figures">
                                            <span class="digits">{{ $pendingcount }}</span>
                                        </div>
                                        <div class="card_subTitle">
                                            <p>Pending Agreements</p>
                                        </div>                        
                                        {{-- <div class="stats">
                                            <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                        </div> --}}
                                    </div>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-6 dash_card">
                                    <div class="inner_section_card">
                                        <div class="top_icon">
                                           <img src="{{ asset('website/images/lead.svg') }}">
                                            
                                        </div>
                                        {{-- <div class="card_title">
                                            <h6>View by people</h6>
                                        </div> --}}
                                        <div class="card_figures">
                                            <span class="digits">${{ $totalearing }}</span>
                                        </div>
                                        <div class="card_subTitle">
                                            <p>Total Earning </p>
                                        </div>                        
                                        {{-- <div class="stats">
                                            <p><span>2.3% <i class="fas fa-long-arrow-alt-up"></i> </span> than last week</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 main_right_col">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="inner_section_table">
                                        <div class="top_header">
                                            <div class="heading">
                                                <h4>Recent Leads</h4>
                                            </div>
                                            {{-- <div class="view_all_btn">
                                                <a href="#!">View All <i class="fas fa-chevron-down"></i></a>
                                            </div> --}}
                                        </div>
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                            <table class="table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Sender Agent</th>
                                                        <th>Recevier Agent</th>
                                                        <th>Location</th>
                                                        <th>Lead Type</th>
                                                        <th>Status</th>
                                                        {{-- <th>Share by</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($reqagreement as $element)
                                                      
                                                    <tr>
                                                        <td>
                                                            <div class="profile_image">
                                                                <img src="{{ asset('storage') }}/uploads/users/{{ $element->GetSender->profile->pic??'' }}">
                                                            </div>
                                                        </td>
                                                        <td>                                
                                                            {{ $element->GetSender->name??'Not Available' }}
                                                        </td>
                                                        <td>{{ $element->GetReceiver->name??'Not Available' }}</td>
                                                        <td>{{ $element->location }}</td>
                                                        <td>{{ $element->lead_type }}</td>
                                                        <td>
                                                            <a class="status_btn status_active" href="#!">@if($element->status == 0) Pending @elseif($element->status == 3) Canceled @elseif($element->status == 4) Rejected @elseif($element->status == 2) Agreement Sign Both sides @endif</a>
                                                            
                                                        </td>
                                                    </tr>
                                                   
                                                  @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <nav data-pagination class="table_pagination">
                                            <a href=# disabled><i class="fas fa-chevron-left"></i></a>
                                            <ul>
                                                <li class=current><a href=#1>1</a>
                                                <li><a href=#2>2</a>
                                                <li><a href=#3>3</a>
                                                <li><a href=#4>4</a>
                                                <li><a href=#5>5</a>
                                                <li><a href=#6>6</a>
                                                <li><a href=#7>7</a>
                                                <li><a href=#8>8</a>
                                                <li><a href=#9>9</a>
                                                <li><a href=#10>…</a>
                                                <li><a href=#41>41</a>
                                            </ul>
                                            <a href=#2><i class="fas fa-chevron-right"></i></a>
                                        </nav> --}}
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="inner_section_swipper">
                                        <div class="main_heading">
                                            <h3>Agents</h3>
                                        </div>
                                        <!-- Swiper -->
                                        <div class="swiper dashboard_slider">
                                            <div class="swiper-wrapper">
                                            
                                              @foreach ($user as $element)
                                                {{-- <a href="{{ url('/agent/agent/' . $element->id) }}">     --}}
                                                    <div class="swiper-slide">
                                                        <a href="{{ url('/agent/agent/' . $element->id) }}">
                                                        <div class="inner_slide">
                                                            <div class="main_image">                                
                                                                <img src="{{ asset('storage') }}/uploads/users/{{ $element->profile->pic??'' }}">
                                                            </div>
                                                            <div class="right_details">
                                                                <div class="name content">
                                                                    <i class="fas fa-user-tie"></i>
                                                                    <span>{{ $element->name??'' }}</span>
                                                                </div>
                                                                <div class="brokerage content">
                                                                    <i class="fas fa-briefcase"></i>
                                                                    <span>{{ $element->profile->brokerage_company??'' }}</span>
                                                                </div>
                                                                <div class="email content">
                                                                    <i class="fas fa-briefcase"></i>
                                                                    <span>{{ $element->email??'' }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                {{-- </a> --}}
                                               @endforeach 
                                               



                                            </div>
                                            {{-- <div class="swiper-button-next"></div> --}}
                                            {{-- <div class="swiper-button-prev"></div>
                                            <div class="swiper-pagination"></div> --}}
                                        </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 main_left_col">
                            <div class="inner_section_right_detailCol">
                            <div class="top_details">
                                <div class="main_image">
                                    <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic??'')}}">
                                </div>
                                <div class="User_name">
                                    <h3>matthew</h3>
                                </div>
                               {{--  <div class="rating">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div> --}}
                            </div>
                            <div class="user_details">
                                <table>
                                    <tbody>
                                        
                                      
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="social_icons">
                                <div class="icon">
                                    <a href="#!">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="icon">
                                    <a href="#!">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="icon">
                                    <a href="#!">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        @endif
    @endif

@endsection

@push('js')
    <script src="{{asset('js/db1.js')}}"></script>

@endpush