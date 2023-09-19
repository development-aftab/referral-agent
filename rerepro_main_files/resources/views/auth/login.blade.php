@extends('website.layout.master')
@push('css')
 <style type="text/css">
     .invalids {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: .875em;
    color: #dc3545;
}
 </style>
@endpush
@section('content')



<section class="Login_page">
    <div class="container">

        <div class="row row_main">

            <div class="col-md-12 col_main" data-aos="flip-up">
                <h1>Login</h1>
                <p>Welcome back!  Please provide your email and password to login.
                <p>

                 <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('login') }}">
                {{csrf_field()}}
                    <div class="form_group_1">
                        <i class="fas fa-envelope"></i>
                       <input id="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong> 
                                    </span>
                        @endif
                        @if(session()->has('deacti'))
                                    <span class="invalids">
                                        <strong>{{ session()->get('deacti') }}</strong>
                                    </span>
                        @endif            

                    </div>

                    <div class="form_group_2">
                        <i class="fas fa-lock"></i>
                         <input id="password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="check_box">
                        <div class="form-check">
                            <input type="checkbox" id="checkbox-signup" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label my_label" for="flexCheckDefault">
                                <p> Remember me</p>
                            </label>
                        </div>

                         <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot Password?</a>
                    </div>

                <button class="btn btn-outline-success btn_login_2 custom-btn btn-7" type="submit">
                 <span>   LOGIN</span>
                </button>

            </form>
                <div class="cont_bottom">
                    <p>Don't have a account?</p>
                    <a href="{{ route('pakages') }}">Signup</a>
                </div>


            </div>




        </div>
    </div>
</section>


@endsection
