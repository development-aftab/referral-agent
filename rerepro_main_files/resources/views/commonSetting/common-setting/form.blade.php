<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $commonsetting->title??''}}" required>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('footer_text') ? 'has-error' : ''}}">
    <label for="footer_text" class="col-md-4 control-label">{{ 'Footer Text' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="footer_text" type="textarea" id="footer_text" >{{ $commonsetting->footer_text??''}}</textarea>
        {!! $errors->first('footer_text', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('favicon') ? 'has-error' : ''}}">
    <label for="favicon" class="col-md-4 control-label">{{ 'Favicon' }}</label>
    @include('includes.input_type_file',['file'=>$commonsetting->favicon??'','required'=>'required','nameOrId'=>'favicon','folder'=>'AdminDashboard'])
    {{-- <input class="form-control" name="favicon" type="text" id="favicon" value="{{ $commonsetting->favicon??''}}" required> --}}
    {!! $errors->first('favicon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dashboard_logo') ? 'has-error' : ''}}">
    <label for="dashboard_logo" class="col-md-4 control-label">{{ 'Dashboard Logo' }}</label>
    @include('includes.input_type_file',['file'=>$commonsetting->dashboard_logo??'','required'=>'required','nameOrId'=>'dashboard_logo','folder'=>'AdminDashboard'])
    {{-- <input class="form-control" name="dashboard_logo" type="text" id="dashboard_logo" value="{{ $commonsetting->dashboard_logo??''}}" required> --}}
    {!! $errors->first('dashboard_logo', '<p class="help-block">:message</p>') !!}

</div>
<div class="form-group {{ $errors->has('dashboard_logo_text') ? 'has-error' : ''}}">
    <label for="dashboard_logo_text" class="col-md-4 control-label">{{ 'Dashboard Logo Text' }}</label>
    @include('includes.input_type_file',['file'=>$commonsetting->dashboard_logo_text??'','required'=>'required','nameOrId'=>'dashboard_logo_text','folder'=>'AdminDashboard'])
    {{-- <input class="form-control" name="dashboard_logo_text" type="text" id="dashboard_logo_text" value="{{ $commonsetting->dashboard_logo_text??''}}" required> --}}
    {!! $errors->first('dashboard_logo_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
