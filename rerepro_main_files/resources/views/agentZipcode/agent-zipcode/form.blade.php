<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Area' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="auto_selling" value="{{ $agentzipcode->address??''}}" required>
         <label id="validaddress-error" class="error" for="name">Please Enter Valid Address.</label>
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<input class="form-control" name="state" type="hidden" id="state" value="" >
<input class="form-control" name="city" type="hidden" id="city" value="" >
<input class="form-control" name="lat" type="hidden" id="latitudeauto_selling" value="" >
<input class="form-control" name="lng" type="hidden" id="longitudeauto_selling" value="" >
<input class="form-control" name="zipcode" type="hidden" id="postal_code" value="" >
<input class="form-control" name="agent_id" type="hidden" id="agent_id" value="{{Auth::id()}}" >
<input class="form-control" name="sub" type="hidden"  value="{{Auth::user()->profile->subscription}}" >

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
 <script>
    $("#validaddress-error").hide();
     $(document).ready(function() {
          $("#lat_area").addClass("d-none");
          $("#long_area").addClass("d-none");
     });
  </script>
 <script>
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

//             for (var i = 0; i < place.address_components.length; i++) {
//               for (var j = 0; j < place.address_components[i].types.length; j++) {
//                          console.log(place.address_components[i].types);
//                 if (place.address_components[i].types[j] == "postal_code") {
//                   $('#postal_code').val(place.address_components[i].long_name) 

//                 }
//               }
//             }
             
            var address = place.formatted_address;
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
//                         var address = results[0].formatted_address;
//                         var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
//                         var country = results[0].address_components[results[0].address_components.length - 2].long_name;
//                         var state = results[0].address_components[results[0].address_components.length - 3].short_name;;
//                         var city = results[0].address_components[results[0].address_components.length - 4].long_name;
//                          $('#postal_code').val(pin)
//                         document.getElementById('state').value = state;
//                         document.getElementById('city').value = city;
                        
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
  </script>
  @endpush