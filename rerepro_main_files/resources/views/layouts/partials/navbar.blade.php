<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="{{'/dashboard'}}">
                <b>
                    <img src="{{asset('')}}{{ App\CommonSetting::first()->dashboard_logo??'' }}" alt="home" style="height: 30px" />
                </b>
                <span>
                    <img src="{{asset('')}}{{ App\CommonSetting::first()->dashboard_logo_text??'' }}" alt="homepage" class="dark-logo" style="height: 50px;width: 73px" />
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            @if(session()->get('theme-layout') != 'fix-header')
                <li class="sidebar-toggle">
                    <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                </li>
            @endif


            <li>
                <div class="user_image">
                    <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}">
                </div>
            </li>
            <li>
                <h2>
                    Welcome Back, @if(Auth::user()->hasRole('user')) Matthew @else {{ auth()->user()->name }} @endif
                </h2>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                        <form role="search" class="app-search hidden-xs">
                            <i class="icon-magnifier"></i>
                            <input type="text" placeholder="Search..." class="form-control">
                        </form>
                    </li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                   href="javascript:void(0);">
                   <div class="bell_icon">
                    <i class="far fa-bell"></i>
                    </div>
                    <span class="badge badge-xs badge-danger"><?php
                        if(Auth::user()->hasRole('agent')){
                         $noti =  App\UserNotification::where('receiver_id',Auth::id())->where('is_viewed_by_agent',0)->count();
                        }else{
                         $noti = App\UserNotification::where('is_viewed_by_admin',0)->count();
                        } ?> {{ $noti }}</span>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown" id="notification">
                    
                    
                </ul>
            </li>
            {{-- <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown"
                   href="javascript:void(0);">
                    <i class="icon-calender"></i>
                    <span class="badge badge-xs badge-danger">3</span>
                </a>
                <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <p>
                                    <strong>Task 1</strong>
                                    <span class="pull-right text-muted">40% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <p>
                                    <strong>Task 2</strong>
                                    <span class="pull-right text-muted">20% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <p>
                                    <strong>Task 3</strong>
                                    <span class="pull-right text-muted">60% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete (warning)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:void(0);">
                            <div>
                                <p>
                                    <strong>Task 4</strong>
                                    <span class="pull-right text-muted">80% Complete</span>
                                </p>
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
                                         aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="javascript:void(0);">
                            <strong>See All Tasks</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="right-side-toggle">
                <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                    <i class="icon-settings"></i>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
@push('js')
<script type="text/javascript">
    userNotification()
    function userNotification() {
        $.ajax({
              url: "{{ route('user_notification') }}",
              type: 'get',
              
              success: function(response){
                 $("#notification").html(response);
              }
           });
    }
</script>
<script type="text/javascript">
              $(document).on('click','.anchor', function(e){

              id =  $(this).attr('data-id');
              url = $(this).attr('data-url');
                 $.ajax({
                   url : "{{route('view_remove')}}/"+id,
                   type:'get',
                  fail: function(){
                      return true;
                  },
                  success:function(data){
                       window.location.href = url;
                  }
                });

              });
            </script>
@endpush