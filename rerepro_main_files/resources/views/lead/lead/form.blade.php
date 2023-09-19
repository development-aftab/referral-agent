<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $lead->title??''}}" >
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea  class="form-control" name="description" rows="4" cols="50" type="text" id="description">{{ $lead->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Address') ? 'has-error' : ''}}">
    <label for="Address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="Address" value="{{ $lead->address??''}}" >
        {!! $errors->first('Address', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    <label for="city" class="col-md-4 control-label">{{ 'City' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="city" type="text" id="city" value="{{ $lead->city??''}}" > --}}
        <select class="form-control" name="city" id="city">
                        <option @if(isset($lead) && $lead->city = "Alabama" ) selected  @endif value="Alabama"> Alabama</option>
                        <option @if(isset($lead) && $lead->city = "Alaska" ) selected  @endif value='Alaska' > Alaska</option>
                        <option @if(isset($lead) && $lead->city = "Arizona" ) selected  @endif value='Arizona' > Arizona</option>
                        <option @if(isset($lead) && $lead->city = "Arkansas" ) selected  @endif value='Arkansas' > Arkansas</option>
                        <option @if(isset($lead) && $lead->city = "California" ) selected  @endif value='California' > California</option>
                        <option @if(isset($lead) && $lead->city = "Colorado" ) selected  @endif value='Colorado' > Colorado</option>
                        <option @if(isset($lead) && $lead->city = "Connecticut" ) selected  @endif value='Connecticut' > Connecticut</option>
                        <option @if(isset($lead) && $lead->city = "Delaware" ) selected  @endif value='Delaware' > Delaware</option>
                        <option @if(isset($lead) && $lead->city = "Florida" ) selected  @endif value='Florida' > Florida</option>
                        <option @if(isset($lead) && $lead->city = "Georgia" ) selected  @endif value='Georgia' > Georgia</option>
                        <option @if(isset($lead) && $lead->city = "Hawaii" ) selected  @endif value='Hawaii' > Hawaii</option>
                        <option @if(isset($lead) && $lead->city = "Idaho" ) selected  @endif value='Idaho' > Idaho</option>
                        <option @if(isset($lead) && $lead->city = "Illinois" ) selected  @endif value='Illinois' > Illinois</option>
                        <option @if(isset($lead) && $lead->city = "Indiana" ) selected  @endif value='Indiana' > Indiana</option>
                        <option @if(isset($lead) && $lead->city = "Iowa" ) selected  @endif value='Iowa' > Iowa </option>
                        <option @if(isset($lead) && $lead->city = "Kansas" ) selected  @endif value='Kansas' > Kansas</option>
                        <option @if(isset($lead) && $lead->city = "Kentucky" ) selected  @endif value='Kentucky' > Kentucky</option>
                        <option @if(isset($lead) && $lead->city = "Louisiana" ) selected  @endif value='Louisiana' > Louisiana</option>
                        <option @if(isset($lead) && $lead->city = "Maine" ) selected  @endif value='Maine' > Maine</option>
                        <option @if(isset($lead) && $lead->city = "Maryland" ) selected  @endif value='Maryland' > Maryland</option>
                        <option @if(isset($lead) && $lead->city = "Massachusetts" ) selected  @endif value='Massachusetts' > Massachusetts</option>
                        <option @if(isset($lead) && $lead->city = "Michigan" ) selected  @endif value='Michigan' > Michigan</option>
                        <option @if(isset($lead) && $lead->city = "Minnesota" ) selected  @endif value='Minnesota' > Minnesota</option>
                        <option @if(isset($lead) && $lead->city = "Mississippi" ) selected  @endif value='Mississippi' > Mississippi</option>
                        <option @if(isset($lead) && $lead->city = "Missouri" ) selected  @endif value='Missouri' > Missouri</option>
                        <option @if(isset($lead) && $lead->city = "Montana" ) selected  @endif value='Montana' > Montana</option>
                        <option @if(isset($lead) && $lead->city = "Nebraska" ) selected  @endif value='Nebraska' > Nebraska</option>
                        <option @if(isset($lead) && $lead->city = "Nevada" ) selected  @endif value='Nevada' > Nevada</option>
                        <option @if(isset($lead) && $lead->city = "New_Hampshire" ) selected  @endif value='New_Hampshire' > New Hampshire</option>
                        <option @if(isset($lead) && $lead->city = "New_Jersey" ) selected  @endif value='New_Jersey' > New_Jersey</option>
                        <option @if(isset($lead) && $lead->city = "New_Mexico" ) selected  @endif value='New_Mexico' > New_Mexico</option>
                        <option @if(isset($lead) && $lead->city = "New_York" ) selected  @endif value='New_York' > New_York</option>
                        <option @if(isset($lead) && $lead->city = "North_Carolina" ) selected  @endif value='North_Carolina' > North_Carolina</option>
                        <option @if(isset($lead) && $lead->city = "North_Dakota" ) selected  @endif value='North_Dakota' > North_Dakota</option>
                        <option @if(isset($lead) && $lead->city = "Ohio" ) selected  @endif value='Ohio' > Ohio</option>
                        <option @if(isset($lead) && $lead->city = "Oklahoma" ) selected  @endif value='Oklahoma' > Oklahoma</option>
                        <option @if(isset($lead) && $lead->city = "Oregon" ) selected  @endif value='Oregon' > Oregon</option>
                        <option @if(isset($lead) && $lead->city = "Pennsylvania" ) selected  @endif value='Pennsylvania' > Pennsylvania</option>
                        <option @if(isset($lead) && $lead->city = "Rhode_Island" ) selected  @endif value='Rhode_Island' > Rhode Island</option>
                        <option @if(isset($lead) && $lead->city = "South_Carolina" ) selected  @endif value='South_Carolina' > South Carolina</option>
                        <option @if(isset($lead) && $lead->city = "South_Dakota" ) selected  @endif value='South_Dakota' > South_Dakota</option>
                        <option @if(isset($lead) && $lead->city = "Tennessee" ) selected  @endif value='Tennessee' > Tennessee</option>
                        <option @if(isset($lead) && $lead->city = "Texas" ) selected  @endif value='Texas' > Texas</option>
                        <option @if(isset($lead) && $lead->city = "Utah" ) selected  @endif value='Utah' > Utah</option>
                        <option @if(isset($lead) && $lead->city = "Vermont" ) selected  @endif value='Vermont' > Vermont</option>
                        <option @if(isset($lead) && $lead->city = "Virginia" ) selected  @endif value='Virginia' > Virginia</option>
                        <option @if(isset($lead) && $lead->city = "Washington" ) selected  @endif value='Washington' > Washington</option>
                        <option @if(isset($lead) && $lead->city = "West_Virginia" ) selected  @endif value='West_Virginia' > West Virginia</option>
                        <option @if(isset($lead) && $lead->city = "Wisconsin" ) selected  @endif value='Wisconsin' > Wisconsin</option>
                        <option @if(isset($lead) && $lead->city = "Wyoming" ) selected  @endif value='Wyoming' > Wyoming</option>
                      </select> 
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
    <label for="state" class="col-md-4 control-label">{{ 'State' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="state" type="text" id="state" value="{{ $lead->state??''}}" >
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('zipcode') ? 'has-error' : ''}}">
    <label for="zipcode" class="col-md-4 control-label">{{ 'Zipcode' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="zipcode" type="text" id="zipcode" value="{{ $lead->zipcode??''}}" >
        {!! $errors->first('zipcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="status" type="text" id="status" value="{{ $lead->status??''}}" > --}}
        <select class="form-control" name="status">
            <option @if(isset($lead) && $lead->status == 0 ) selected  @endif value="0">Active</option>
            <option @if(isset($lead) && $lead->status == 1 ) selected  @endif value="1">Close</option>
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for="images" class="col-md-4 control-label">{{ 'Images' }}</label>
    <div class="col-md-6">
        @if(!isset($lead))
        <input class="form-control" name="images[0][lead_image]" type="file" id="images"  >
        @endif    
            <button class="btn btn-success btn-add inline addimage" name="addimage" id="addimage" type="button">
                <span class="fa fa-plus"></span>
            </button>
        <span class="image_row"></span>
        {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
    </div> 

</div>
<div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
    <label for="images" class="col-md-4 control-label">{{ 'Images' }}</label>
    <div class="col-md-6">
         @if(isset($leadImage))
            @foreach ($leadImage as $element)
                <div class="imagediv" style="position:relative;">
                    <button type="button" data-id='{{ $element->id }}' style="right:0px;position: absolute;" class="close AClass">
                       <span>&times;</span>
                    </button>
                    
                    <img src="{{ asset('website') }}/{{ $element->image }}">    
                </div>
            @endforeach
         @endif
        {!! $errors->first('images', '<p class="help-block">:message</p>') !!}
    </div> 

</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
<script type="text/javascript">
    $(document).on('click','.removeimage', function(e){
        $(this).prev().remove();
        $(this).remove();
    });
    image_index = 0;
    $(document).on('click','.addimage',function(e){
        image_index += 1;

        var image_text= '<span style="margin-right:15px"><input class="form-control" style="display: inline;" type="file" name="images['+image_index+'][lead_image]" style="width: 30% !important" accept="image/*"></span><button class="btn btn-danger btn-remove inline removeimage" name="addtopic" id="addtopic" type="button"><span class="fa fa-minus"></span></button>';
        $('.image_row').append(image_text) //append the var defined
    });

   $(document).on('click','.AClass',function(e){
        id = $(this).attr('data-id')
              $(this).closest('.imagediv').remove();
        $.ajax({
            type: 'get',
            url: "{{ route('remove_image_lead') }}/"+id,
            success: function(result) {
            }
                        
        });
    });
</script>
@endpush