@extends('website.layout.master')
@section('content')
<style type="text/css">
    .sec_2_head .map_row #map { width: 100% !important;  height: 100% !important;}
    .sec_2_head .map_row svg { width: 100%;  max-width: 75%;}
    h3.mar_head {
        color: black;
        margin: 0 auto;
        margin-top: 63px;
        width: 96%;
        font-size: 22px;
        border: 1px solid #ff6600;
        border-radius: 5px;
        text-align: center;
        background-color: #ff660026;
    }


</style>
<!-- SECTION 01 -->
<section id="search_lead">
    <div class="container cust_cont section_1">
        <div class="row">
            <div data-aos="fade-right" class="col-md-6">
                <h1>{{ $home->title }}</h1>
                <p>
                    {{ $home->description }}
                </p>
                <div class="form-group row">
                    <div class="input_container">
                        <i class="fas fa-map-marker-alt"></i>
                      
                    </div>
                    <div class="inp_sub col-md-9 col-sm-9 col-9">
                        <input class=" z_code" type="text" placeholder="Search Area" id="auto_selling">
                        <input class="" type="button" id="find_agent" value="FIND AGENTS">
                    </div>
                </div>
            </div>
            <div class="col-md-6 sec1_img">
                <img data-aos="zoom-in" src="{{ asset('website') }}/{{ $home->image }}" alt="" />
            </div>
        </div>
    </div>
    <!-- <img src="" alt="" /> -->
</section>
<!-- END SECTION 01 -->

<!-- SECTION 02 -->
<section class="sec_2_head">
    <div class="container cust_cont section_2">
        <div class="row" data-aos="fade-right">
            <h1>{{ $weoperate->title }}</h1>
            <p>
               {{ $weoperate->description }}
            </p>
        </div>
        <div class="row map_row">
            <div class="col-md-12">
               <div id="map" style="width:136%; height: 100%;"></div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION 02 -->

<section class="map_list">
    <div class="container cust_cont">
        <div class="row">
            <div class="col-md-12">
                <div class="ul_div">
                    <ul>
                        <li> <a  href="{{ route('search_leads_state') }}/AL"> Alabama      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/AK"> Alaska       </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/AZ"> Arizona      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/AR"> Arkansas     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/CA"> California   </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/CO"> Colorado     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/CT"> Connecticut  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/DE"> Delaware     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/FL"> Florida      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/GA"> Georgia      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/HI"> Hawaii       </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/ID"> Idaho        </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/IL"> Illinois     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/IN"> Indiana      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/IA"> Iowa         </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/KS"> Kansas       </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/KY"> Kentucky     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/LA"> Louisiana    </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/ME"> Maine        </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MD"> Maryland     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MA"> Massachusetts</a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MI"> Michigan     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MN"> Minnesota    </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MS"> Mississippi  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MO"> Missouri     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/MT"> Montana      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NE"> Nebraska     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NV"> Nevada       </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NH"> New Hampshire</a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NJ"> New Jersey   </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NM"> New Mexico   </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NY"> New York      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/NC"> North Carolina</a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/ND"> North Dakota  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/OH"> Ohio          </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/OK"> Oklahoma      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/OR"> Oregon        </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/PA"> Pennsylvania  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/RI"> Rhode Island  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/SC"> South Carolina</a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/SD"> South Dakota  </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/TN"> Tennessee     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/TX"> Texas         </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/UT"> Utah          </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/VT"> Vermont       </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/VA"> Virginia      </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/WA"> Washington    </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/WV"> West Virginia </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/WI"> Wisconsin     </a></li>
                        <li> <a  href="{{ route('search_leads_state') }}/WY"> Wyoming       </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SECTION 03 -->
<section id="WHAT_WE_DO">
    <div class="container cust_cont section_3">
        <div class="row">
            <div class="col-md-6">
                <img data-aos="flip-left" class="section_3_img" src="{{ asset('website') }}/{{ $whatwedo->image }}" alt="" />
            </div>
            <div data-aos="fade-left" class="col-md-6 section-3_col-2 sec_3_txt">
                <h1>{{ $whatwedo->title }}</h1>
                <p> {{ $whatwedo->description }}</p>
                <!-- <button class="btn btn-outline-success btn_learnmore" type="submit">
                    LEARN MORE
                </button> -->
                <a href="{{ route('what_we_do_more') }}" class="custom-btn btn-7 btn_learnmore"><span>LEARN MORE</span></a>
            </div>
            <!-- Swiper -->
            <h3 class="mar_head">Our partner agents work with many of the nation’s largest brokerages and brands in the real estate industry.</h3>
            <div data-aos="zoom-in-down" class="swiper mySwiper_dup ">
                <div class="swiper-wrapper" id="partners">
                  @foreach ($group as $element)
                    <div class="swiper-slide">
                        <img class="img-fluid" src="{{ asset('website') }}/{{ $element->image }}" alt="">
                    </div>
                  @endforeach  
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>
            {{-- <form class="d-flex justify-content-center">
                <button data-aos="fade-right" class="btn btn-outline-success btn_realestate custom-btn btn-7" type="submit">
                    <span> Real Estate Agents</span>
                </button>
                <button data-aos="fade-left" class="btn btn-success btn_buyersandsellers ancolor custom-btn btn-7" type="submit">
                    <span> Buyers and Sellers</span> </button>
            </form> --}}
        </div>
    </div>
</section>
<!-- END SECTION 03 -->

<!-- SECTION 04 -->
<section class="section_4" id="REAL_ESTATE_AGENTS">
    <div class="container-fluid ">
        <div class="row footer_first_row">
            <div class="col-md-12 col-sm-12">
                <div class="card card_realEstate" data-aos="flip-right">
                    <div class="card-body">
                        <img src="{{ asset('website') }}/{{ $estateagent->image }}" alt="" />
                        <h2 class="card-title">{{ $estateagent->title }}</h2>
                        <p class="card-text">
                            {{ $estateagent->description }}
                        </p>
                        <a @if(Auth::user()) href="{{ route('dashboard') }}"  @else  href="{{ route('pakages') }}" @endif class="btn btn-outline-success btn_signupReceive " type="submit">
                            Sign Up To Receive Referrals
                        </a> 
                        <a href="{{ route('pakages') }}" class="btn btn-outline-success btn_signupReceive " type="submit">
                             Membership Options
                        </a>
                        
                        {{--<a href="#search_lead" class="btn btn-success btn_Referral " type="submit">--}}
                            {{--Give a Referral--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-6 d-flex" id="BUYERS_SELLERS">
                <div class="card card_BuyerAndseller " data-aos="flip-left">
                    <div class="card-body">
                        <img src="{{ asset('website') }}/{{ $buyerandseller->image }}" alt="" />
                        <h2 class="card-title">{{ $buyerandseller->title }}</h2>
                        <p class="card-text">
                            {{ $buyerandseller->description }}
                        </p>
                        <a href="#partners" class="btn btn-outline-success btn_partner  " type="submit">
                            Our Partner Agents
                        </a>
                        
                        <a href="{{ route('what_we_do_more') }}" class="btn btn-success btn_buyers   " type="submit">
                            What We Do
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- END SECTION 04 -->



@endsection
@push('js')
<script type="text/javascript">
      $('#map').usmap({
        'stateStyles': {fill: '#ff6600'} ,
        'stateHoverStyles': {fill: '#6610f2'},
        'click' : function(event, data) {
          console.log(data.name);
          window.location.replace("{{ route('search_leads_state') }}/"+data.name);
         } 
      });
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
      pin='';
      state='';
      latitude='';
      longitude='';
      google.maps.event.addDomListener(window, 'load', initializes);
       function initializes() {
        var acOptions = {
          
        types: ['(cities)'],
        componentRestrictions: {country: "us"}
        };
         var input = document.getElementById('auto_selling');
         var autocomplete = new google.maps.places.Autocomplete(input,acOptions);
         autocomplete.addListener('place_changed', function() {
             var place = autocomplete.getPlace();
             $('#latitudeauto_selling').val(place.geometry['location'].lat());
             $('#longitudeauto_selling').val(place.geometry['location'].lng());

             $("#lat_area").removeClass("d-none");
             $("#long_area").removeClass("d-none");
              //            for (var i = 0; i < place.address_components.length; i++) {
              //               for (var j = 0; j < place.address_components[i].types.length; j++) {
              //                          console.log(place.address_components[i].types);
              //                 if (place.address_components[i].types[j] == "postal_code") {
              //                   $('#postal_code').val(place.address_components[i].long_name) 

              //                 }
              //               }
              //             }
             
                address = place.formatted_address;
                latitude = place.geometry.location.lat();
                longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
             var geocoder = geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    if (results[0]) {
//                         var address = results[0].formatted_address;
//                             pin = results[0].address_components[results[0].address_components.length - 1].long_name;
//                         var country = results[0].address_components[results[0].address_components.length - 2].long_name;
//                             state = results[0].address_components[results[0].address_components.length - 3].short_name;;
//                         var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                            for (var i = 0; i < results[0].address_components.length; i++) {
                              for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                                   if(results[0].address_components[i].types[j] == 'administrative_area_level_1'){
                                       state = results[0].address_components[i].short_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'postal_code'){
                                        pin = results[0].address_components[i].long_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'administrative_area_level_2'){
                                       var city = results[0].address_components[i].long_name;
                                       
                                   }else if(results[0].address_components[i].types[j] == 'country'){
                                       var country = results[0].address_components[i].long_name;
                                   }
                              }
                            }
                    }
                }
            });
         });
     }

      $(document).on('click','#find_agent',function(e){
        if(state == '' || pin == '' || latitude == '' || longitude == '' ){
             swal({
                icon: 'error',
                title: 'Please Enter Area',
                showConfirmButton: false,
                timer: 4500
             })
        }else{
            window.location.replace("{{ route('search_leads_state_zip') }}/"+state+"/"+pin+"/"+latitude+"/"+longitude);
       }
      });  
      // $(document).on('click','#find_agent',function(e){
      //   {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM52bC4tsQFv_3IPHLJ7kyrMx1Ys_teaU"></script> --}}
      //   var currentLocation = $('#location').val();
      //   var currentZipCode = $('#zip_code').val();
      //    if(currentZipCode == ''){
      //        swal({
      //           icon: 'error',
      //           title: 'Please Enter zipcode',
      //           showConfirmButton: false,
      //           timer: 4500
      //        })
      //    }else{
      //       var latitude = '';
      //       var longitude = '';
      //       var geocoder = new google.maps.Geocoder();
      //       geocoder.geocode({ 
      //          componentRestrictions: { 
      //              country: 'US', 
      //              postalCode: currentZipCode
      //          } 
      //       }, function (results, status) {
      //           if (status == google.maps.GeocoderStatus.OK) {
      //               latitude = results[0].geometry.location.lat();
      //               longitude = results[0].geometry.location.lng();
      //               console.log(latitude + ", " + longitude);
      //               window.location.replace("{{ route('search_leads_state_zip') }}/"+currentLocation+"/"+currentZipCode+"/"+latitude+"/"+longitude);
      //           } else {
      //               alert("Request failed.")
      //           }
      //       });
      //     }
      // });
</script>


<!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper_dup", {
        slidesPerView: 5,
        spaceBetween: 30,
        loop: true,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
          breakpoints: {
              320: {
                  slidesPerView: 1,
                  spaceBetween: 10,
              },
              425: {
                  slidesPerView: 2,
                  spaceBetween: 20,
              },
              480: {
                  slidesPerView: 2,
                  spaceBetween: 20,
              },
              640: {
                  slidesPerView: 2,
                  spaceBetween: 20,
              },
              767: {
                  slidesPerView: 3,
                  spaceBetween: 20,
              },
              991: {
                  slidesPerView: 3,
                  spaceBetween: 40,
              },
              1024: {
                  slidesPerView: 5,
                  spaceBetween: 50,
              },
          },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
      });
    </script>

    <script>
        $(document).ready(function(){
            $('#map svg').attr('viewBox', '0 0 950 650');
            $('#map svg').attr('height', 'auto');
        });
    </script>

@endpush