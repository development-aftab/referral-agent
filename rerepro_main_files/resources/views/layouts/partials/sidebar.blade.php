<aside class="sidebar">
    <div class="scroll-sidebar">

        {{-- @if(session()->get('theme-layout') != 'fix-header')
            <div class="user-profile">
                <div class="dropdown user-pro-body ">
                    <div class="profile-image">
                        @if(auth()->user()->profile->pic == null)
                        <img src="{{asset('storage/uploads/users/img_avatar.png')}}" alt="user-img" class="img-circle">
                        @else
                            <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}" alt="user-img" class="img-circle">
                        @endif


                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger">
                            <i class="fa fa-angle-down"></i>
                        </span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="{{url('profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{'account-settings'}}"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> {{auth()->user()->name}}</a></p>
                </div>
            </div>
        @endif --}}
        <div class="top-left-part">
            <a class="logo" href="{{ route('index') }}">
                <img src="{{ asset('website') }}/images/ReReProLogo.png" alt="home" style="height: 30px" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul id="side-menu">


                    <li>
                        <a class=" waves-effect" href="{{url('dashboard')}}" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27.61" height="24" viewBox="0 0 27.61 24">
                                <g id="Group_1309" data-name="Group 1309" transform="translate(-280.748 -296.036)">
                                    <path id="Path_1211" data-name="Path 1211" d="M304.048,397.631c0-1.5,0-3,0-4.5,0-.727.347-1.144.928-1.139s.915.423.915,1.153q0,4.353,0,8.705c0,.9.3,1.209,1.206,1.211.98,0,1.961-.017,2.94.009.371.01.481-.086.476-.469-.021-1.9-.011-3.8-.009-5.707,0-.908.3-1.214,1.2-1.214q3.4,0,6.8,0c.93,0,1.222.3,1.223,1.253,0,1.864.011,3.728-.008,5.592,0,.4.047.572.514.551.978-.044,1.96-.01,2.94-.014.855,0,1.168-.321,1.168-1.192q0-4.382,0-8.763a.985.985,0,0,1,.567-1.034c.651-.287,1.274.181,1.279.982.009,1.653,0,3.305,0,4.958,0,1.345.007,2.69,0,4.036a2.762,2.762,0,0,1-2.878,2.859c-1.422.007-2.844,0-4.266,0-.832,0-1.157-.321-1.158-1.143,0-1.922-.01-3.844.006-5.765,0-.357-.064-.491-.461-.484q-2.277.039-4.554,0c-.415-.007-.549.074-.542.523.03,1.883.014,3.766.012,5.65,0,.91-.3,1.218-1.2,1.22-1.4,0-2.806.005-4.209,0a2.765,2.765,0,0,1-2.9-2.9C304.043,400.552,304.048,399.091,304.048,397.631Z" transform="translate(-20.608 -84.878)" fill="#fff"/>
                                    <path id="Path_1212" data-name="Path 1212" d="M280.749,306.226a.923.923,0,0,1,.437-.766q6.354-4.535,12.7-9.077a.987.987,0,0,1,1.271.011q6.347,4.542,12.7,9.08a.912.912,0,0,1,.295,1.385c-.35.45-.84.479-1.424.063q-5.887-4.2-11.764-8.409a.627.627,0,0,0-.881-.012q-5.751,4.14-11.527,8.244a3.513,3.513,0,0,1-.477.322A.908.908,0,0,1,280.749,306.226Z" transform="translate(0 -0.107)" fill="#fff"/>
                                    <path id="Path_1213" data-name="Path 1213" d="M306.786,296.039c.576,0,1.151-.007,1.726,0a.936.936,0,0,1,1.046.9c.011.562-.4.933-1.068.94-.748.008-1.5.016-2.244-.005-.3-.009-.39.085-.382.384.02.748.013,1.5,0,2.244-.007.665-.38,1.079-.942,1.066a.935.935,0,0,1-.9-1.049q-.012-1.726,0-3.453a.928.928,0,0,1,1.032-1.031C305.635,296.031,306.21,296.039,306.786,296.039Z" transform="translate(-20.585 0)" fill="#fff"/>
                                </g>
                            </svg> 
                            <span class="hide-menu"> Dashboard </span></a>
                        @if(auth()->user()->isAdmin() == true)
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('dashboard')}}">Modern Version</a></li>
                            <li><a href="{{asset('index2')}}">Clean Version</a></li>
                            <li><a href="{{asset('index3')}}">Analytical Version</a></li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> eCommerce </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{asset('index4')}}">Dashboard</a></li>
                                    <li><a href="{{asset('products')}}">Products</a></li>
                                    <li><a href="{{asset('product-detail')}}">Product Detail</a></li>
                                    <li><a href="{{asset('product-edit')}}">Product Edit</a></li>
                                    <li><a href="{{asset('product-orders')}}">Product Orders</a></li>
                                    <li><a href="{{asset('product-cart')}}">Product Cart</a></li>
                                    <li><a href="{{asset('product-checkout')}}">Product Checkout</a></li>
                                </ul>
                            </li>
                        </ul>
                        @endif
                    </li>
                @if(auth()->user()->isAdmin() == true)

                    <li><a class="waves-effect" href="{{asset('role-management')}}">
                            <i class=" icon-layers fa-fw"></i><span class="hide-menu"> Roles </span></a>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-user fa-fw"></i> <span class="hide-menu"> Users</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('users')}}">Manage Users</a></li>
                            <li><a href="{{asset('user/create')}}">Add New User</a></li>
                            <li><a href="{{asset('user/deleted')}}">Deleted Users</a></li>

                        </ul>
                    </li>
                    <li><hr /></li>
                    {{--<li><a class="waves-effect" href="{{asset('permission-management')}}"> <i--}}
                                    {{--class="icon-list fa-fw"></i><span class="hide-menu"> Permissions</span></a></li>--}}
                    <li><a class="waves-effect" href="{{asset('crud-generator')}}">
                            <i class="icon-drawar fa-fw"></i><span class="hide-menu"> CRUD Generator</span></a>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-eye fa-fw"></i> <span class="hide-menu"> Logs</span></a>
                        <ul aria-exzpanded="false" class="collapse">
                            <li><a href="{{asset('log-viewer')}}">Laravel Log</a></li>
                            <li><a href="{{asset('activity-log')}}">Activity Log</a></li>

                        </ul>
                    </li>

                    @endif
                    @foreach($laravelAdminMenus->menus as $section)
                        @if(count(collect($section->items)) > 0)
                            @foreach($section->items as $menu)
                                @can('view-'.str_slug($menu->title))
                                    @if($menu->title == 'Lead')
                                    <li class="two-column">
                                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"> <img src="{{ asset('website') }}/images/lead.svg"><span class="hide-menu"> Leads</span></a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="{{route('Lead_send')}}">Sent</a></li>
                                            <li><a href="{{route('lead_recevied')}}">Received</a></li>
                                            <li><a href="{{route('index')}}">Create New Referral</a></li>
                                        </ul>
                                    </li>
                                        {{-- <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img src="{{ asset('website') }}/images/lead.svg">
                                                <span class="hide-menu">  {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $menu->title) }}</span>
                                            </a>
                                        </li>  --}}

                                    @elseif($menu->title == 'SocialMedia')
                                    @elseif($menu->title == 'HomePage')
                                    @elseif($menu->title == 'WeOperate')
                                    @elseif($menu->title == 'WhatWeDo')
                                    @elseif($menu->title == 'WeOperate')
                                    @elseif($menu->title == 'Group')
                                    @elseif($menu->title == 'EstateAgent')
                                    @elseif($menu->title == 'BuyerAndSeller')
                                    @elseif($menu->title == 'ReferalAgreement')
                                         <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img src="{{ asset('website') }}/images/aggrement.svg">
                                                <span class="hide-menu">@if(Auth::user()->hasRole('user')) Referral Agreements @else Signed Referral Agreements @endif</span>
                                            </a>
                                        </li>  
                                    @if(Auth::user()->hasRole('agent'))  
                                        <li>
                                            <a class="waves-effect" href="{{ route('past_referral') }}">
                                                <img src="{{ asset('website') }}/images/aggrement.svg">
                                                <span class="hide-menu"> Past Referral Agreements </span>
                                            </a>
                                        </li> 
                                    @endif    
                                    @elseif($menu->title == 'AgentZipcode')
                                         <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img src="{{ asset('website') }}/images/area.svg">
                                                <span class="hide-menu">  {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Area Cover') }}</span>
                                            </a>
                                        </li> 
                                    @elseif($menu->title == 'Agent')
                                        <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img width="30px" src="{{ asset('website') }}/images/agent.svg">
                                                <span class="hide-menu">Agents</span>
                                            </a>
                                        </li>
                                    @elseif($menu->title == 'PaymentDetail')
                                        <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img width="30px" src="{{ asset('website') }}/images/payment.svg">
                                                <span class="hide-menu"> Payment Details</span>
                                            </a>
                                        </li>
                                    @elseif($menu->title == 'Subscription')
                                        <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <img src="{{ asset('website') }}/images/subscrition.svg">
                                                <span class="hide-menu">  {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $menu->title) }}</span>
                                            </a>
                                        </li> 
                                    @else
                                        <li>
                                            <a class="waves-effect" href="{{ url($menu->url) }}">
                                                <i class="glyphicon {{$menu->icon}} fa-fw"></i>
                                                <span class="hide-menu">  {{ preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $menu->title) }}</span>
                                            </a>
                                        </li>
                                    @endif    
                                @endcan
                            @endforeach
                        @endif
                    @endforeach
                   @if(Auth::user()->hasRole('user'))
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"> <img src="{{ asset('website') }}/images/cms.svg"> <span class="hide-menu">CMS</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('homePage/home-page')}}">Home Page</a></li>
                            <li><a href="{{asset('weOperate/we-operate')}}">We Operate</a></li>
                            <li><a href="{{asset('whatWeDo/what-we-do')}}">What We Do</a></li>
                            <li><a href="{{asset('group/group')}}">Groups</a></li>
                            <li><a href="{{asset('estateAgent/estate-agent')}}">Estate Agent</a></li>
                            <li><a href="{{asset('buyerAndSeller/buyer-and-seller')}}">Buyers And Sellers</a></li>
                            <li><a href="{{asset('socialMedia/social-media')}}">Social Media</a></li>

                        </ul>
                    </li>
                  @endif
             
                <li>
                    <a class="waves-effect" href="{{ url('account-settings') }}">
                        
                         <img src="{{ asset('website') }}/images/settings.svg">
                        <span class="hide-menu">Settings</span>
                    </a>
                </li>

                <li>
                    <a class="waves-effect" href="{{route('logout')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.077" height="25" viewBox="0 0 25.077 25">
                            <g id="Group_1314" data-name="Group 1314" transform="translate(-421.54 -896.947)">
                                <path id="Path_1232" data-name="Path 1232" d="M421.545,909.422q0-4.066,0-8.131a3.98,3.98,0,0,1,4.313-4.341q3.665,0,7.329,0a3.911,3.911,0,0,1,4.128,4.071c.017,1.54-.032,3.081.02,4.619.021.622-.318.511-.683.528-.413.019-.666,0-.649-.562.046-1.477.022-2.956.015-4.435a2.648,2.648,0,0,0-2.911-2.893q-3.7-.008-7.391,0a2.615,2.615,0,0,0-2.844,2.826q0,8.316,0,16.632a2.649,2.649,0,0,0,2.876,2.869q3.726,0,7.453,0a2.644,2.644,0,0,0,2.815-2.813c.013-1.519.022-3.039-.008-4.558-.009-.448.14-.591.549-.512.312.06.8-.255.774.476-.047,1.559,0,3.121-.018,4.681a3.909,3.909,0,0,1-4.034,4.049c-2.546.025-5.092.021-7.637,0a3.952,3.952,0,0,1-4.1-4.131C421.533,915.007,421.545,912.214,421.545,909.422Z" transform="translate(0)" fill="#5a5a5a"/>
                                <path id="Path_1233" data-name="Path 1233" d="M499.993,955.757c-1.382-1.379-2.642-2.669-3.942-3.917-.648-.621.145-.758.319-1.079.238-.437.431-.036.586.118,1.733,1.722,3.452,3.459,5.192,5.173.279.275.313.422.015.715q-2.635,2.591-5.226,5.227c-.29.294-.435.286-.693-.024-.526-.633-.544-.619.049-1.212l3.672-3.671h-.794q-6.682,0-13.365-.007c-.2,0-.53.136-.588-.145a2.721,2.721,0,0,1,.017-1.091c.038-.178.33-.083.5-.084q5.3-.007,10.593,0Z" transform="translate(-55.754 -46.979)" fill="#5a5a5a"/>
                            </g>
                        </svg>
                      
                        <span class="hide-menu"> Logout</span>
                    </a>
                </li>

                @if(auth()->user()->isAdmin() == true)
                    <li><hr /></li>

                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-equalizer fa-fw"></i> <span class="hide-menu"> UI Elements</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('panels-wells')}}">Panels and Wells</a></li>
                            <li><a href="{{asset('panel-ui-block')}}">Panels With BlockUI</a></li>
                            <li><a href="{{asset('portlet-draggable')}}">Draggable Portlet</a></li>
                            <li><a href="{{asset('buttons')}}">Buttons</a></li>
                            <li><a href="{{asset('tabs')}}">Tabs</a></li>
                            <li><a href="{{asset('modals')}}">Modals</a></li>
                            <li><a href="{{asset('progressbars')}}">Progress Bars</a></li>
                            <li><a href="{{asset('notification')}}">Notifications</a></li>
                            <li><a href="{{asset('carousel')}}">Carousel</a></li>
                            <li><a href="{{asset('user-cards')}}">User Cards</a></li>
                            <li><a href="{{asset('timeline')}}">Timeline</a></li>
                            <li><a href="{{asset('timeline-horizontal')}}">Horizontal Timeline</a></li>
                            <li><a href="{{asset('range-slider')}}">Range Slider</a></li>
                            <li><a href="{{asset('ribbons')}}">Ribbons</a></li>
                            <li><a href="{{asset('steps')}}">Steps</a></li>
                            <li><a href="{{asset('session-idle-timeout')}}">Session Idle Timeout</a></li>
                            <li><a href="{{asset('session-timeout')}}">Session Timeout</a></li>
                            <li><a href="{{asset('bootstrap-ui')}}">Bootstrap UI</a></li>
                        </ul>
                    </li>
                    <li class="two-column">
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-docs fa-fw"></i> <span class="hide-menu"> Pages</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('starter-page')}}">Starter Page</a></li>
                            <li><a href="{{asset('blank')}}">Blank Page</a></li>
                            <li><a href="{{asset('search-result')}}">Search Result</a></li>
                            <li><a href="{{asset('custom-scroll')}}">Custom Scrolls</a></li>
                            <li><a href="{{asset('login')}}">Login Page</a></li>
                            <li><a href="{{asset('lock-screen')}}">Lock Screen</a></li>
                            <li><a href="{{asset('recoverpw')}}">Recover Password</a></li>
                            <li><a href="{{asset('animation')}}">Animations</a></li>
                            <li><a href="{{asset('profile')}}">Profile</a></li>
                            <li><a href="{{asset('invoice')}}">Invoice</a></li>
                            <li><a href="{{asset('gallery')}}">Gallery</a></li>
                            <li><a href="{{asset('pricing')}}">Pricing</a></li>
                            <li><a href="{{asset('register')}}">Register</a></li>
                            <li><a href="{{asset('400')}}">Error-400</a></li>
                            <li><a href="{{asset('403')}}">Error-403</a></li>
                            <li><a href="{{asset('404')}}">Error-404</a></li>
                            <li><a href="{{asset('500')}}">Error-500</a></li>
                            <li><a href="{{asset('503')}}">Error-503</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-notebook fa-fw"></i> <span class="hide-menu"> Forms </span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('form-basic')}}">Basic Forms</a></li>
                            <li><a href="{{asset('form-layout')}}">Form Layout</a></li>
                            <li><a href="{{asset('icheck-control')}}">Icheck Control</a></li>
                            <li><a href="{{asset('form-advanced')}}">Form Addons</a></li>
                            <li><a href="{{asset('form-upload')}}">File Upload</a></li>
                            <li><a href="{{asset('form-dropzone')}}">File Dropzone</a></li>
                            <li><a href="{{asset('form-pickers')}}">Form-pickers</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-grid fa-fw"></i> <span class="hide-menu"> Tables</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{asset('basic-table')}}">Basic Tables</a></li>
                            <li><a href="{{asset('table-layouts')}}">Table Layouts</a></li>
                            <li><a href="{{asset('data-table')}}">Data Table</a></li>
                            <li><a href="{{asset('bootstrap-tables')}}">Bootstrap Tables</a></li>
                            <li><a href="{{asset('responsive-tables')}}">Responsive Tables</a></li>
                            <li><a href="{{asset('editable-tables')}}">Editable Tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                    class="icon-layers fa-fw"></i> <span class="hide-menu"> Extra</span></a>
                        <ul aria-expanded="false" class="collapse extra">
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Inbox </span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{asset('inbox')}}">Mail Box</a></li>
                                    <li><a href="{{asset('inbox-detail')}}">Mail Details</a></li>
                                    <li><a href="{{asset('compose')}}">Compose Mail</a></li>
                                    <li><a href="{{asset('contact')}}">Contact</a></li>
                                    <li><a href="{{asset('contact-detail')}}">Contact Detail</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{asset('calendar')}}" aria-expanded="false"><span
                                            class="hide-menu">Calendar</span></a>
                            </li>
                            <li>
                                <a href="{{asset('widgets')}}" aria-expanded="false"><span
                                            class="hide-menu"> Widgets </span></a>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Charts</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{asset('morris-chart')}}">Morris Chart</a></li>
                                    <li><a href="{{asset('peity-chart')}}">Peity Charts</a></li>
                                    <li><a href="{{asset('knob-chart')}}">Knob Charts</a></li>
                                    <li><a href="{{asset('sparkline-chart')}}">Sparkline charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Icons</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{asset('simple-line')}}">Simple Line</a></li>
                                    <li><a href="{{asset('fontawesome')}}">Fontawesome</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                            class="hide-menu"> Maps</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{asset('map-google')}}">Google Map</a></li>
                                    <li><a href="{{asset('map-vector')}}">Vector Map</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
                <div class="bottom_footer">
                    <center>© Copyright 2021 ReRePro.</br>All rights Reserved.</center>
                </div>
            </ul>
        </nav>
    </div>
</aside>