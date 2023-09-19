                    <div class="col-md-12 mobile_view">
                        <div class="form_group_1">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" name="name" placeholder="Agent name" required>

                        </div>
                          <div class="form_group_1" >
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email_register" name="email" placeholder="Email" required>
                            <span></span>

                        </div>
                        <div class="form_group_1">
                            <i class="fas fa-phone-alt"></i>
                            <input type="text" name="phone" placeholder="Agent phone" id="phoneField" required>

                        </div>
                         <div class="form_group_1" >
                            <i class="fas fa-user-tie"></i>
                            <input type="text" name="agent_address" id="auto_selling" class="find-search-header" placeholder="Agent Area" required>
                             <label id="validaddress-error" class="error" for="name">Please Enter Valid Address.</label>
                            <input type="hidden" name="latitude" id="latitudeauto_selling" class="form-control">
                            <input type="hidden" name="longitude" id="longitudeauto_selling" class="form-control">
                            <input type="hidden" name="city" id="city" class="form-control">

                        </div>
                           <div class="form_group_1" >
                            <i class="fas fa-globe"></i>
                            <input type="text" name="agent_website" placeholder="Agent website (optional)">

                        </div>
                         <div class="form_group_1">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" name="managing_broker_name" placeholder="Managing broker name">

                        </div>
                        <div class="form_group_1">
                            <i class="fas fa-briefcase"></i>
                            <input type="text" name="brokerage_company" placeholder="Brokerage/Company" required>

                        </div>
                        <div class="form_group_1">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" name="brokerage_company_address" placeholder="Brokerage/Company address" required>

                        </div>
                         <div class="form_group_1" >
                            <i class="fas fa-phone-alt"></i>
                            <input type="text" id='companyphone' name="brokerage_company_phone" placeholder="Brokerage/Company phone" >

                        </div>
                           <div class="form_group_1" >
                            <i><img src="{{ asset('website') }}/assets/img/Icon material-location-city.png" alt=""></i>
                            <input type="text" name="license_state" placeholder="License state" >
                            <input type="hidden" name="postal_code" id="postal_code" placeholder="License state">
                            <input type="hidden" name="state" id="state" placeholder="License state">

                        </div>
                          <div class="form_group_1">
                            <i> <img src="{{ asset('website') }}/assets/img/Icon material-confirmation-number.png" alt=""></i>
                            <input type="text" name="license_number" placeholder="License number" >

                        </div>
                        <div class="form_group_1 pass_f">
                            <i><img src="{{ asset('website') }}/assets/img/Icon ionic-ios-lock.png" alt=""></i>
                            <input id="password-field" type="password" name="password" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        </div>
                           <div class="form_group_1 pass_f" >
                            <i><img src="{{ asset('website') }}/assets/img/Icon ionic-ios-lock.png" alt=""></i>
                            <input id="re-password-field" type="password" placeholder="Retype password" >
                            <span toggle="#re-password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        </div>
                      
                       
                        <div class="form_group_1 textarea_sec" >
                            <i><img src="{{ asset('website') }}/assets/img/Icon material-location-city.png" alt=""></i>
                            <textarea type="text" name="about_us" placeholder="About Us"  ></textarea>
                        </div>
                        {{-- <div class="form_group_1 fileType_sec">
                            <i class="fas fa-user-tie"></i>

                            <input id="profle_image_file" class="profle_image_file" type="file" name="profle_image" placeholder="Profile Image">
                            <label for="profle_image_file" class="lbl_profile_image">Agent Profile Image</label>

                        </div> --}}
                       
                     
                       
                      
                     
                     
                         <div class="form_group_1 upload_img_sec" >
                                    <div class="img_upload">
                                        <input id="logo_img" onchange="readURL(this);" class="profle_image_file chose_file_input" type="file" name="company_logo" placeholder="Profile Image">
                                        <label for="logo_img">
                                            <img id="logo_picture" style="width: 100%;" src="{{ asset('website') }}/assets/img/company_logo_img.png" alt="Company Logo" />
                                        </label>
                                    </div>
                         </div>
                            <div class="form_group_1 upload_img_sec" >
                                    <div class="img_upload">
                                        <input id="profle_image_file" onchange="readURL1(this);" class="profle_image_file chose_file_input" type="file" name="profle_image" placeholder="Profile Image">
                                        <label for="profle_image_file">
                                            <img id="profile_picture"  style="width: 100%;" src="{{ asset('website') }}/assets/img/profile_pic_img.png" alt="Profile Image" />
                                        </label>
                                    </div>

                                </div>
                    </div>
<script type="text/javascript">
     $("#validaddress-error").hide();
      var companyphone = document.getElementById('companyphone');
          companyphone.addEventListener('keyup', function(){
              var phoneValue = companyphone.value;
              var output;
                  phoneValue = phoneValue.replace(/[^0-9]/g, '');
              var area = phoneValue.substr(0, 3);
              var pre = phoneValue.substr(3, 3);
              var tel = phoneValue.substr(6, 4);
                  if (area.length < 3) {
                        output = "(" + area;
                  } else if (area.length == 3 && pre.length < 3) {
                        output = "(" + area + ")" + " " + pre;
                  } else if (area.length == 3 && pre.length == 3) {
                        output = "(" + area + ")" + " " + pre + " - "+tel;
                  }
                  companyphone.value = output;

    });  
    var phoneField = document.getElementById('phoneField');
    phoneField.addEventListener('keyup', function(){
        var phoneValue = phoneField.value;
        var output;
            phoneValue = phoneValue.replace(/[^0-9]/g, '');
        var area = phoneValue.substr(0, 3);
        var pre = phoneValue.substr(3, 3);
        var tel = phoneValue.substr(6, 4);
        if (area.length < 3) {
            output = "(" + area;
        } else if (area.length == 3 && pre.length < 3) {
            output = "(" + area + ")" + " " + pre;
        } else if (area.length == 3 && pre.length == 3) {
            output = "(" + area + ")" + " " + pre + " - "+tel;
        }
        phoneField.value = output;

    });
    $('#email_register').on('blur', function(){
    var email = $('#email_register').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
          url: "{{ route('check_email') }}",
          type: 'get',
          data: {
            'email_check' : 1,
            'email' : email,
          },
          success: function(response){
            if (response.msg == 'taken' ) {
               email_state = false;
               $('.btn_signup_3').prop('disabled', true);
               $('#email_register').siblings("span").text('Sorry... Email already taken');
            }else if (response.msg == 'not_taken') {
               email_state = true;
               $('.btn_signup_3').prop('disabled', false);
               $('#email_register').siblings("span").text('Email available');
            }
          }
        });
    });
    $(document).on('click','#training_payment',function(e){
        if($('#loginform').valid()){ 
             $('#online_personal_training_payment').modal('show');
        }else{
             $(".error").focus();
        }  
         
    }); 
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>