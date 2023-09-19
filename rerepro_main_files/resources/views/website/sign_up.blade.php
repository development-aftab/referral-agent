@extends('website.layout.master')
@section('content')
    <link href="{{ asset('website') }}/js/jquery.signaturepad.css" rel="stylesheet">
    <style type="text/css">
        .sigWrapper{height: 86%;width: 151%;}
        #bcPaint #bcPaint-palette{width: 180px;}
        #bcPaint #bcPaint-palette .bcPaint-palette-color:nth-child(n+3):nth-child(-n+12) {display: none;}
        #bcPaint #bcPaintCanvas{width: 500px; height: 100%;}
        #bcPaint-canvas-container{width: fit-content; display: inline-block;}
        #bcPaint #bcPaint-bottom{display: inline-block; width: fit-content;}
        #loginform input.profle_image_file, #loginform input.company_logo_file {display: inline-block;line-height: 40px; color: white; width: 90px;}
        #loginform .textarea_sec {padding: 0 0 0 38px;}
        #loginform .textarea_sec [name="about_us"] {width: 100%; padding-top: 4px;}
        #loginform .textarea_sec {align-items: flex-start;padding-top: 10px;}
        #loginform .fileType_sec {justify-content: flex-start;padding: 0 0 0 37px;}
        #loginform .profle_image_file {margin-left: 25px;}
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
        .signup form .form_group_1 label.error {width: 100%;position: absolute;bottom: -33px;left: 20px;color: red;font-weight: 400;}
        .chose_file_label{
            background-color: #ff6600;
            color: white;
            padding: 5px 10px;
            border-radius: 6px;
            margin: 7px 10px;
            border: 1px solid #ff6600;
            transition: .5s;
        }
        .chose_file_label:hover{
            color: #ff6600;
            background-color: white;
            cursor: pointer;
        }
        .chose_file_input{
            display: none !important;
        }
        .upload_img_sec .img_upload {
            /*width: 164px;*/
            /*height: 164px;*/
            margin: 15px auto;
            border-radius: 50%;
            overflow: hidden;
        }
        .upload_img_sec .img_upload img {
            object-fit: cover;
            position: center;
        }


        @media screen and (max-width: 13440px){
            #loginform .fileType_sec {padding-left: 26px;}
        }
        @media screen and (max-width: 1600px) {
            #loginform .textarea_sec {
                padding: 0 0 0 22px;
            }
        }
        @media screen and (max-width: 1280px) {
            #bcPaint #bcPaint-bottom {
                width: 100%;
            }
        }
        @media screen and (max-width: 1024px) {
            .upload_img_sec .img_upload {
                margin: 12px auto;
            }
        }
        @media screen and (max-width: 800px) {
            .upload_img_sec .img_upload {
                margin: 32px auto;
            }
            .signup .btn_signup_3{
                margin: 25px auto 0px;
            }
            .paint_div{
                text-align: center;
            }
            .signup .p_main{
                text-align: justify;
            }
        }
        @media screen and (max-width: 768px) {
            .upload_img_sec .img_upload {
                margin: 23px auto;
            }
        }
        @media screen and (max-width: 767px){
            #bcPaint #bcPaintCanvas{
                width: 100%;
            }
            #loginform .textarea_sec {
                padding: 0 0 0 30px !important;
            }
        }
        @media screen and (max-width: 600px) {
            #loginform .textarea_sec {
                padding: 0 0 0 18px !important;
            }
        }
        @media screen and (max-width: 375px) {
            #loginform .textarea_sec {
                padding: 0 0 0 8px !important;
            }
        }


    </style>

    <section class="signup">
        <div class="container custom_container">
            <div class="row row_main">
                <div class=" col_main">

                    <h1>Sign Up</h1>
                    <p>Sign up today to give and receive more real estate referrals!</p>

                </div>


                <form class="form-horizontal form-material row" id="loginform" method="post" action="{{ route('sign_up_process') }}"enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div id="desktop_view_html">

                    </div>
                    <div id="mobile_view_html">
                    </div>




                    <p class="p_main">In the event Receiving Broker/Agent receives a commission or other payment for services rendered in connection with a real estate transaction consummated involving the Referred Client within 365 days of the date this Referral Contract is executed by both parties.  Referring Broker/Agent will be entitled to a referral fee in the amount of twenty-five, 25% (percent),of the sale commission (buyer/seller/both) that Receiving Broker/Agent receives in connection with the foregoing transaction.
                        The parties hereby agree that the referral fee shall be fully paid by the Receiving Broker/Agent no later than 30 business days after the transaction is completed.
                        *Referral fees may be subject to withholding tax or other forms of taxes in the country in which the transaction takes place. Referring agents should be aware of state, provincial, or local laws in their respective markets with regards to paying referrals
                        * If any dispute is made during, before, or after the referral is made it is agreed upon by all parties (Referring Agent, Receiving Agent, and Referral-Agent.com) that Referral-Agent.com will be held harmless and the dispute will be handled between the agents and their respective brokerages. Any agent(s), brokers(s), or brokerages found to be in violation of any of these terms will be permanently banned from use of Referral-Agent.com.
                        This contract will expire within one year of mutual execution of both parties (Receiving and Referring broker) If both parties want to cooperate after the expiration date, they will have to execute a new referral contract.
                    </p>

                    <p class="p_1">Receiving Agent Signature: </p>
         <div class="sigPad" id="linear" style="">

<ul class="sigNav">
{{-- <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
 --}}<li class="clearButton"><a href="#clear">Clear</a></li>
</ul>
<div class="sig sigWrapper" style="height:auto;">
<div class="typed"></div>
<canvas class="pad" id="bcPaintCanvas"  height="250"></canvas>
<input type="hidden" name="output" class="output">
</div>
</div>

                     <div class="paint_div">
                        <div id="bcPaint"></div>
                        <input style="display: none" type="hidden" id="signature" name="signature" >




                        <button class="btn btn-outline-success btn_signup_3  custom-btn btn-7 " id="image_get" type="button">
                            <span>  Save Signature</span>
                        </button>
                        {{-- <div id="payment_div" >
                            <select class="form-control" id="subcription">
                                <option value="0">Basic Member</option>
                                <option value="99">Premier Member (billed monthly at $9.99)</option>
                                <option value="10">Premier Member (billed annually at $99.99)</option>
                            </select>
                        </div> --}}
                        <div id="button">
                            <input type="hidden" name="sub" value="{{ $pak }}">
                            <input type="hidden" name="price" value="{{ $price }}">
                            @if($pak == 'basic')
                                <button id="confirm_booking" class="btn btn-outline-success btn_signup_3  custom-btn btn-7"  id="submit" type="submit">
                                    <span>  SIGN UP</span>
                                </button>
                            @else
                                <button  class="btn btn-outline-success btn_signup_3  custom-btn btn-7 " id="training_payment" type="button" >
                                    <span>  SIGN UP </span>
                                </button>
                            @endif
                        </div>

                        <div class="modal fade online_personal_training_modal" id="online_personal_training_payment" tabindex="-1" role="dialog" aria-labelledby="online_personal_training_paymentLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="modal-body">


                                        <h4>Initial Payment of:${{ $price }}<span class="price"></span></h4>


                                        <div class="form-group">
                                            <span style="color: red" ></span>
                                            <input type="email" class="form-control" id="email" name="strip_email" placeholder="Email*">
                                        </div>

                                        <div><small>type: <strong id="ccnum-type"></strong></small></div>
                                        <div class="form-group card_number">
                                            <span><i class="far fa-credit-card"></i></span>
                                            <input type="text" class="form-control card_no" name="card_number" id="ccnum_input" placeholder="Card Number">
                                            <input type="text" class="form-control mm_dd" name="card_expiry" id="expiry_input" placeholder="MM/YY">
                                            <input type="text" class="form-control cvc" name="cvv" id="cvc_input" placeholder="CVC">
                                        </div>
                                        <button  id="submit" type="submit" class="btn btn-primary">Subscribe</button>
                                        <div id="result" class="emoji valid"></div>

                                        <img src="{{ asset('website') }}/images/powered by.png" alt="powered by image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="cont_bottom">
                    <p>Already have account?</p>
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection
@push('js')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.js"></script>
 <script src="{{ asset('website') }}/js/jquery.signaturepad.js"></script>
 <script src="{{ asset('website') }}/js/json2.min.js"></script>
    <script type="text/javascript">
    $( document ).ready(function() {    
        if (screen.width<=699){
                $.ajax({
                    type: 'get',
                    url: "{{ route('mobile_view_html') }}",
                    async: false,
                    success: function(result) {
                        $("#mobile_view_html").html(result);
                        $("#loginform").validate({
                            ignore: "select:hidden",
                            submitHandler: function (form) { // for demo
                                 return true; // for demo
                            },
                            invalidHandler: function(form) {
                                 $('#image_get').show();
                                 $('#button').hide();
                                 $('.clearButton').show();
                            }
                        });
                    }
                });        
            // $("#mobile_view_html").load("");

        }else{
                $.ajax({
                    type: 'get',
                    url: "{{ route('desktop_view_html') }}",
                    async: false,
                    success: function(result) {
                        $("#desktop_view_html").html(result);
                        $("#loginform").validate({
                            ignore: "select:hidden",
                            submitHandler: function (form) { // for demo
                                 return true; // for demo
                            },
                            invalidHandler: function(form) {
                                 $('#image_get').show();
                                 $('#button').hide();
                                 $('.clearButton').show();
                            }
                        });
                    }
                });      
            // $("#desktop_view_html").load("");

        }
    });    
    </script>
 
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#logo_picture').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile_picture').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function PreviewImage1() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("signature").files[0]);
        oFReader.onload = function (oFREvent) {
            document.getElementById("signature_image").src = oFREvent.target.result;
        };
    };
</script>
<script type="text/javascript">
    // $('#bcPaint').bcPaint();
    $('#linear').signaturePad({drawOnly:true, lineTop:200 , bgColour :'#fffaf3'});
    $('#bcPaint-export').hide();
    $('#payment_div').hide();
    $('#button').hide();
    $("#image_get").click(function () {
        var canvas = document.getElementById("bcPaintCanvas");
        var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
        $('#signature').val(image);
        $('#payment_div').show();
        $('#button').show();
        $('#image_get').hide();
        $('.clearButton').hide();
    });
</script>
<script>
    $(document).ready(function() {
        $("#lat_area").addClass("d-none");
        $("#long_area").addClass("d-none");
    });
</script>
<script>
   
    google.maps.event.addDomListener(window, 'load', initializes);
    function initializes() {
        var acOptions = {
            types: ['(regions)']
        };
        var input = document.getElementById('auto_selling');
        var autocomplete = new google.maps.places.Autocomplete(input,acOptions);
        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            $('#latitudeauto_selling').val(place.geometry['location'].lat());
            $('#longitudeauto_selling').val(place.geometry['location'].lng());
            $("#lat_area").removeClass("d-none");
            $("#long_area").removeClass("d-none");
             address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        for (var i = 0; i < results[0].address_components.length; i++) {
                          for (var j = 0; j < results[0].address_components[i].types.length; j++) {
                               if(results[0].address_components[i].types[j] == 'administrative_area_level_1'){
                                   var state = results[0].address_components[i].short_name;
                                   document.getElementById('state').value = state;
                               }else if(results[0].address_components[i].types[j] == 'postal_code'){
                                   var pin = results[0].address_components[i].long_name;
                                    $('#postal_code').val(pin)
                               }else if(results[0].address_components[i].types[j] == 'administrative_area_level_2'){
                                   var city = results[0].address_components[i].long_name;
                                   document.getElementById('city').value = city;
                               }else if(results[0].address_components[i].types[j] == 'country'){
                                   var country = results[0].address_components[i].long_name;
                               }
                          }
                        }
                                    doStuff(false,pin);

                        // var address = results[0].formatted_address;
                        // var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        // var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        // var state = results[0].address_components[results[0].address_components.length - 3].short_name;;
                        // var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        // $('#postal_code').val(pin)
                        // document.getElementById('state').value = state;
                        // document.getElementById('city').value = city;
                    }
                }
            });
        });

        input.addEventListener("change", () => {
          //this fires when the user changes to a non-selection / freeform text
          doStuff(true);
        });
        function doStuff(isFreeText,pin) {
          //maybe clear the selection or do whatever you need to reset

          if (isFreeText) {
            $("#validaddress-error").show();    
            input.value = "";
            return;
          }else{
            if(typeof pin == 'string' ){
                $("#validaddress-error").hide();
            }else{
                $("#validaddress-error").show();    
                input.value = "";
                return;
            }
          }
          // handle a place selection
        }

    }


    // function is_location_valid()
    // {
    //     var geocoder = new google.maps.Geocoder();

    //     geocoder.geocode( {"address": address}, function(results, status) {
    //         console.log(results)
    //         if (status == google.maps.GeocoderStatus.OK)
    //         {
              
    //            if(typeof pin == 'string' ){
    //               $("#validaddress-error").hide();
    //            }else{
    //               $('#auto_selling').val('');
    //               $("#validaddress-error").show();    
    //            }
              
    //         }
    //         else
    //         {
    //             $('#auto_selling').val('');
    //             $("#validaddress-error").show();

    //         }
    //     });
    // }
    var input = document.getElementById('auto_selling');
    google.maps.event.addDomListener(input, 'keydown', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
        }
    });
     
    $(document).on('change','#subcription',function(e){
        var numItems = $('.error').length;
        if(numItems == 0){
            val = $(this).val()
            $('.price').html(val)
            $('.stripe_checkout_app').remove();
            $('#button').html('')
            $.ajax({
                type: 'get',
                url: "{{ route('get_payment_button') }}",
                data: {'val':val},
                success: function(result) {
                    $('#button').html(result)
                }
            });
        }else{
            $(".error").focus();
        }
    });
    $(document).on('click','#confirm_booking',function(){
        $("#loginform").submit();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.6/js/intlTelInput.min.js"></script>
<script src="{{asset('js/payform/dist/payform.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('js/payform/dist/jquery.payform.min.js')}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
    (function() {
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
</script>
@endpush