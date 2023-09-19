@extends('website.layout.master')
@section('content')

<section class="contact_page">
    <div class="container custom_container">
        <div class="row row_main">
            <div class="heading" data-aos="fade-right">
                <h1>Contact Us</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
            </div>

            <div class="col-md-8 col_1 "data-aos="flip-right">
                <form action="">

                    <div class="form_group_1">

                        <input type="text" placeholder="Name">

                    </div>

                    <div class="col_form">

                        <div class="form_group_1 form_group_wd">

                            <input type="email" placeholder="Email">

                        </div>
                        <div class="form_group_1 form_group_wd">

                            <input type="phone" placeholder="Phone">

                        </div>

                    </div>

                    <div class="form_group_1">

                        <textarea name="" id="" cols="30" rows="4" placeholder="Message"></textarea>

                    </div>
                    <button class="btn btn-outline-success btn_login_3" type="submit">
                        SUBMIT
                    </button>
                </form>

            </div>
            <div class="col-md-4 col_2_main" data-aos="flip-left">
                <div class="col_2">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>4891 Independence St. Suite 210 Wheat Ridge, Co 80033</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection