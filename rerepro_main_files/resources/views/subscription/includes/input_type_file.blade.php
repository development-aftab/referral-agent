<div class="col-md-6">
    <input class="form-control" name="{{$nameOrId}}" type="file" id="{{$nameOrId}}" {{$required??""}}>
    {!! $errors->first('{{$nameOrId}}', '<p class="help-block">:message</p>') !!}
	@if(!$file=="")
    	<img src="{{ asset('').$file??'Not Available' }}" style="width: 100px;height: 100px" >
	@endif
</div>	