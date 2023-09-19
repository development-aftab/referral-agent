<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('website') }}/css/bcPaint.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('website') }}/css/demo-page.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('website') }}/css/bcPaint.mobile.css" />

    <meta name="description" content="JOIN. CONNECT. GROW.
    Grow your real estate referral network today! Sign up, make more money with Referral-Agent.com.">
    <meta name="keywords" content="referral, agent, agency">
    <meta name="author" content="John Doe">
    <title>Referral Agent</title>


     @stack('css') 
     
</head>

<body>
        <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container custom_header">
                <a class="navbar-brand" href="/index.php"><img src="{{ asset('website') }}/assets/img/ReReProLogo.png" class="img-fluid"
                        alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                                HOME
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}/#WHAT_WE_DO"> WHAT WE DO </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}/#REAL_ESTATE_AGENTS"> REAL ESTATE AGENTS </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}/#BUYERS_SELLERS"> BUYERS & SELLERS </a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                RESOURCES
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('benefits_of_membership') }}">Benefits of Membership </a></li>
                                <li><a class="dropdown-item" href="{{ route('reasons_to_join') }}">10 Reasons to Join </a></li>
                                <li><a class="dropdown-item" href="{{ asset('website') }}/{{ 'pdf/referral_agreement.pdf' }}" download>Referral Agreement</a></li>
                               {{--  <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li> --}}
                            </ul>
                        </li>
                        @if(Auth::user())
                            <li>
                                <a class="nav-link btn btn-outline-success btn_login custom-btn" href="{{ route('logout') }}"><span> LOGOUT </span> </a>
                            </li>
                            <li>
                                <a class="nav-link btn btn-success btn_signup custom-btn" href="{{ route('dashboard') }}"><span>  DASHBOARD  </span></a>
                            </li>
                        @else    
                            <li>
                                <a class="nav-link btn btn-outline-success btn_login custom-btn" href="{{ route('login') }}"><span> LOG IN </span> </a>
                            </li>
                            <li>
                                <a class="nav-link btn btn-success btn_signup custom-btn" href="{{ route('pakages') }}"><span> SIGN UP </span></a>
                            </li>
                        @endif
                    </ul>
                    <!-- <form class="d-flex">
                        <button class="btn btn-outline-success btn_login" type="submit">
                LOG IN
              </button>
                        <button class="btn btn-success btn_signup" type="submit">
                SIGN UP
              </button>
                    </form> -->
                </div>
            </div>
        </nav>
    </header>
    <!-- END HEADER -->


@yield('content')

    <!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row footer_first_row">
            <div class="col-md-4" data-aos="fade-right">
                <a href="#"> <img data-aos="zoom-in-down" src="{{ asset('website') }}/assets/img/ReReProLogoWhite.png" alt="" /></a>
                <p class="logo_paragraph">We work nationwide with our partner real estate agents to connect the best
                    real estate agents with buyers and sellers.</p>
                <?php
                  $media = App\SocialMedia::get();
                ?>    
                @foreach ($media as $element)
                  <a href="{{ $element->link }}" target="_blank" > <i class="fab {{ $element->icon }} social_icon"></i></a>
                @endforeach
                
            </div>
            <div class="col-md-4 footer_second_column">
                <h3 class="footer_heading" data-aos="fade-down">Quick links</h3>
                <ul data-aos="fade-up" class="footer_ul">
                    <li><a href="{{ route('index') }}">HOME</a></li>
                    <li><a href="{{ route('index') }}/#WHAT_WE_DO">WHAT WE DO</a></li>
                    <li><a href="{{ route('index') }}/#REAL_ESTATE_AGENTS">REAL ESTATE AGENTS</a></li>
                    <li><a href="{{ route('index') }}/#BUYERS_SELLERS">BUYER AND SELLER</a></li>
                    <li><a href="#">RESOURCES</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3 data-aos="fade-down-left">Subscribe Newsletter</h3>
                <input data-aos="fade-left" id="EnteryourEmail" type="email" class="form-control footer_input" placeholder="Email address">
                <button id="subscribe" data-aos="fade-left" class="btn btn-success btn_learnmore  custom-btn"
                    type="button"><span>SUBSCRIBE</span></button>

                <ul class="pri_term">
                    <li><a href="{{ route('privacy_policy') }}"> Privacy policy</a></li>
                    <li>|</li>
                    <li><a href="{{ route('terms_and_conditions') }}"> Terms & Conditions</a></li>
                </ul>

            </div>
        </div>


    </div>

</footer>

<!-- END FOOTER -->
<!-- INITIALIZE aos -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
      duration:500,
      once: true
  });
</script>
<!-- <script>
    aos.init({
        offset: 200,
        duration: 800,
        easing: 'ease-in-quad',
        delay: 100,
    });
</script> -->


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    slideperview: 5,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->get('flash_message'))
    <script>
        swal({
            icon: 'success',
            title: '{{session()->get('flash_message')}}',
            showConfirmButton: false,
            timer: 4500
        })
    </script>
@elseif(session()->get('error_log'))
    <script>
        swal({
            icon: 'error',
            title: '{{session()->get('error_log')}}',
            showConfirmButton: false,
            timer: 4500
        })
    </script>
@endif
<script type="text/javascript" src="{{ asset('website') }}/js/bcPaint.js"></script>
<script src="{{ asset('website') }}/js/raphael.js"></script>
<script src="{{ asset('website') }}/js/color.jquery.js"></script>
<script src="{{ asset('website') }}/js/us-map.js"></script>
<script src="{{asset('website/js/swiper.min.js')}}"></script>
<script src="{{asset('website/js/custom.js')}}"></script>
<script>
    $(document).on('click','#subscribe', function(e){
       
        email =  $('#EnteryourEmail').val();

        $.ajax({

            url : "{{route('mailchip_subcription')}}/"+email,

            type: "GET",
            success:function(data){
                if(data['type']=='success') {
                    swal({
                        icon: data['type'],
                        title: data['msg'],
                        showConfirmButton: false,
                        timer: 4500
                    })
                }else{
                    swal({
                         icon: data['type'],
                         title: data['msg'],
                         showConfirmButton: false,
                         timer: 4500
                    })
                }
            }
        });
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU&libraries=places"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-229048120-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-229048120-1');
</script>

@stack('js')
</body>

</html>


