@extends('layouts.master')

@push('css')
    <link href="{{ asset('plugins/components/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('plugins/components/icheck/skins/all.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet"/>
    {{--<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">--}}
    <link href="{{asset('plugins/components/jqueryui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/css/bootstrapValidator.min.css">
    <style>

        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;
        }
        .nav-pills>li>a{
           /* cursor: default;;*/
            background-color: inherit;
        }
        .nav-pills>li>a:focus,.nav-tabs>li>a:focus, .nav-pills>li>a:hover, .nav-tabs>li>a:hover {
            border: 1px solid transparent!important;
            background-color: inherit!important;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }
        .error-block{
            background-color: #ff9d9d;
            color: red;
        }
        body li.next_button.active a{
            background-color: #ff6600;
            border: 1px solid #ff6600;
        }
        body li.next_button.active a:hover{
            background-color: white;
            color: #ff6600;
            border: 1px solid #ff6600 !important;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Account Settings</h3>
                    <div class="clearfix"></div>
                    <form id="commentForm" action="{{url('account-settings')}}"
                          method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div id="rootwizard">
                            <ul class="nav nav-tabs">
                                <li class=" next_button" data-type="1"><a href="#tab1"  >USER PROFILE</a></li>
                                <li class="next_button" data-type="2"><a href="#tab2 "  >BIO</a></li>
                                <li class="next_button" data-type="3" ><a href="#tab3 " >ADDRESS</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                        <label for="name" class="col-sm-2 control-label">Name *</label>
                                        <div class="col-sm-10">
                                            <input id="name" name="name" type="text"
                                                   placeholder="Name" class="form-control required"
                                                   value="{{$user->name}}"/>

                                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                        <label for="email" class="col-sm-2 control-label">Email *</label>
                                        <div class="col-sm-10">
                                            <input id="email" name="email" placeholder="E-mail" type="text"
                                                   class="form-control required email" value="{{$user->email}}"/>
                                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                     <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                                        <label for="phone" class="col-sm-2 control-label">Phone *</label>
                                        <div class="col-sm-10">
                                            <input id="phone" name="phone" placeholder="phone" type="text"
                                                   class="form-control required phone" value="{{$user->profile->phone}}"/>
                                            {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('agent_website', 'has-error') }}">
                                        <label for="agent_website" class="col-sm-2 control-label">Agent  website *</label>
                                        <div class="col-sm-10">
                                            <input id="agent_website" name="agent_website" placeholder="agent website" type="text"
                                                   class="form-control required agent_website" value="{{$user->profile->agent_website}}"/>
                                            {!! $errors->first('agent_website', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('brokerage_company', 'has-error') }}">
                                        <label for="brokerage_company" class="col-sm-2 control-label">Brokerage  Company *</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_company" name="brokerage_company" placeholder="Brokerage Company" type="text"
                                                   class="form-control required brokerage_company" value="{{$user->profile->brokerage_company}}"/>
                                            {!! $errors->first('brokerage_company', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div> 
                                    <div class="form-group {{ $errors->first('brokerage_company_phone', 'has-error') }}">
                                        <label for="brokerage_company_phone" class="col-sm-2 control-label">Brokerage/Company Phone *</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_company_phone" name="brokerage_company_phone" placeholder="Brokerage/Company phone" type="text"
                                                   class="form-control required brokerage_company_phone" value="{{$user->profile->brokerage_company_phone}}"/>
                                            {!! $errors->first('brokerage_company_phone', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div> 
                                    <div class="form-group {{ $errors->first('license_number', 'has-error') }}">
                                        <label for="license_number" class="col-sm-2 control-label">License Number *</label>
                                        <div class="col-sm-10">
                                            <input id="license_number" name="license_number" placeholder="License Number" type="text"
                                                   class="form-control required license_number" value="{{$user->profile->license_number}}"/>
                                            {!! $errors->first('license_number', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('license_state', 'has-error') }}">
                                        <label for="license_state" class="col-sm-2 control-label">License State *</label>
                                        <div class="col-sm-10">
                                            <input id="license_state" name="license_state" placeholder="License State" type="text"
                                                   class="form-control required license_state" value="{{$user->profile->license_state}}"/>
                                            {!! $errors->first('license_state', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div> 
                                    <div class="form-group {{ $errors->first('managing_broker_name', 'has-error') }}">
                                        <label for="managing_broker_name" class="col-sm-2 control-label">Managing Broker Name *</label>
                                        <div class="col-sm-10">
                                            <input id="managing_broker_name" name="managing_broker_name" placeholder="Managing Broker Name" type="text"
                                                   class="form-control required managing_broker_name" value="{{$user->profile->managing_broker_name}}"/>
                                            {!! $errors->first('managing_broker_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <h6><b>If you don't want to change password... please leave them empty</b></h6>

                                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                                        <label for="password" class="col-sm-2 control-label">Password *</label>
                                        <div class="col-sm-10">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                   class="form-control required" value="{!! old('password') !!}"/>
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('password_confirmation', 'has-error') }}">
                                        <label for="password_confirm" class="col-sm-2 control-label">Confirm Password
                                            *</label>
                                        <div class="col-sm-10">
                                            <input id="password_confirmation" name="password_confirmation"
                                                   type="password"
                                                   placeholder="Confirm Password " class="form-control required"/>
                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group  {{ $errors->first('dob', 'has-error') }}" style="display: none;">
                                        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input autocomplete="off" value="{{$user->profile->dob ?: null}}" id="dob" name="dob" type="text"  class="form-control"
                                                   data-date-format="YYYY-MM-DD"
                                                   placeholder="yyyy-mm-dd"/>
                                            <span class="help-block">{{ $errors->first('dob', ':message') }}</span>

                                        </div>
                                    </div>


                                    <div class="form-group {{ $errors->first('pic_file', 'has-error') }}">
                                        <label for="pic" class="col-sm-2 control-label">Profile picture</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;">
                                                    @if($user->profile->pic != null)
                                                        <img src="{{asset('storage/uploads/users/'.$user->profile->pic)}}" alt="profile pic">
                                                    @else
                                                        <img src="http://placehold.it/200x200" alt="profile pic">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="pic" name="pic_file" type="file" class="form-control"/>
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block">{{ $errors->first('pic_file', ':message') }}</span>
                                        </div>
                                    </div>
                                      <div class="form-group {{ $errors->first('Logo', 'has-error') }}">
                                        <label for="logo" class="col-sm-2 control-label">Logo</label>
                                        <div class="col-sm-10">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 200px;">
                                                    @if($user->profile->logo != null)
                                                        <img src="{{asset('website/'.$user->profile->logo)}}" alt="profile logo">
                                                    @else
                                                        <img src="http://placehold.it/200x200" alt="profile logo">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 200px;"></div>
                                                <div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="logo" name="logo" type="file" class="form-control"/>
                                                </span>
                                                    <a href="#" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <span class="help-block">{{ $errors->first('logo', ':message') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="bio" data-type='about_us' class="col-sm-2 control-label">About Us
                                            <small> *</small>
                                        </label>
                                        <div class="col-sm-10">
                        <textarea name="about_us" id="about_us" class="form-control resize_vertical"
                                  rows="4">{{$user->profile->about_us}}</textarea>
                                        </div>
                                        {!! $errors->first('about_us', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">
                                    <div class="form-group {{ $errors->first('gender', 'has-error') }}" style="display: none;">
                                        <label for="email" class="col-sm-2 control-label">Gender *</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" title="Select Gender..." name="gender">
                                                <option value="">Select</option>
                                                <option value="male"
                                                        @if($user->profile->gender === 'male') selected="selected" @endif >Male
                                                </option>
                                                <option value="female"
                                                        @if($user->profile->gender === 'female') selected="selected" @endif >
                                                    Female
                                                </option>
                                                <option value="other"
                                                        @if($user->profile->gender === 'other') selected="selected" @endif >Other
                                                </option>

                                            </select>
                                            <span class="help-block">{{ $errors->first('gender', ':message') }}</span>
                                        </div>

                                    </div>

                                    <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                        <label for="country" class="col-sm-2 control-label">Country</label>
                                        <div class="col-sm-10">
                                            <input id="countries" name="country" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->country}}"/>
                                            <span class="help-block">{{ $errors->first('country', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                        <label for="state" class="col-sm-2 control-label">State</label>
                                        <div class="col-sm-10">
                                            <input id="state" name="state" type="text"
                                                   class="form-control"
                                                   value="{{$user->profile->state}}"/>
                                            <span class="help-block">{{ $errors->first('state', ':message') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                        <label for="city" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-10">
                                            <input id="city" name="city" type="text" class="form-control"
                                                   value="{{$user->profile->city}}"/>
                                            <span class="help-block">{{ $errors->first('city', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                        <label for="address" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input id="address" name="address" type="text" class="form-control"
                                                   value="{{$user->profile->address}}"/>
                                            <span class="help-block">{{ $errors->first('address', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->first('brokerage_company_address', 'has-error') }}">
                                        <label for="brokerage_company_address" class="col-sm-2 control-label">Brokerage Company Address</label>
                                        <div class="col-sm-10">
                                            <input id="brokerage_company_address" name="brokerage_company_address" type="text" class="form-control"
                                                   value="{{$user->profile->brokerage_company_address}}"/>
                                            <span class="help-block">{{ $errors->first('brokerage_company_address', ':message') }}</span>

                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                        <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                        <div class="col-sm-10">
                                            <input id="postal" name="postal" type="text" class="form-control"
                                                   value="{{$user->profile->postal}}"/>
                                            <span class="help-block">{{ $errors->first('postal', ':message') }}</span>

                                        </div>
                                    </div>
                                    <div class="container">
                                      <div class="row">
                                        <div class="col text-center">
                                         <button class="btn btn-success" type="submit">Update</button>
                                        </div>
                                      </div>
                                    </div>
                                    
                                <ul class="pager wizard">
                                   {{--  <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li> --}}
                                    {{-- <li class="next finish" ><a href="javascript:;">Finish</a></li> --}}
                                </ul>
                                </div>

                            </div>
                        </div>
                    </form>


                    @if(count($errors) > 0)
                        <div class="alert alert-danger">Errors! Please fill form with proper details</div>
                    @endif

                </div>
            </div>
        </div>

        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/components/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('plugins/components/icheck/icheck.init.js')}}"></script>
    <script src="{{asset('plugins/components/moment/moment.js')}}"></script>
    {{--<script src="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>--}}
    <script src="{{asset('plugins/components/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap-wizard/1.2/jquery.bootstrap.wizard.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"
            type="text/javascript"></script>
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{ asset('js/edituser.js') }}"></script>

    <script>
         $(document).on('click','.next_button',function(e){
          $(this).closest('ul').find('li').removeClass( "active" );
           $(this).addClass('active');
           $(".tab-content").find('.active').removeClass( "active" );
           if($(this).attr('data-type') == '1'){
                $('#tab1 ').addClass('active');
            }else if($(this).attr('data-type') == '2'){
                $('#tab2 ').addClass('active');
            }else{
                $('#tab3 ').addClass('active');
            }
         });
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
    </script>
    <script>
        $("#dob").datepicker({
            dateFormat: 'yy-m-d',
            SetDate:"{{$user->profile->dob}}",
            widgetPositioning:{
                vertical:'bottom'
            },
            keepOpen:false,
            useCurrent: false,
            maxDate: moment().add(1,'h').toDate()
        });
          
    </script>
@endpush