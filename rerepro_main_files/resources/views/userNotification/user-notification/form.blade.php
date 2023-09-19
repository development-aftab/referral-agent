<div class="form-group {{ $errors->has('sender_id') ? 'has-error' : ''}}">
    <label for="sender_id" class="col-md-4 control-label">{{ 'Sender Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sender_id" type="text" id="sender_id" value="{{ $usernotification->sender_id??''}}" >
        {!! $errors->first('sender_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('receiver_id') ? 'has-error' : ''}}">
    <label for="receiver_id" class="col-md-4 control-label">{{ 'Receiver Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="receiver_id" type="text" id="receiver_id" value="{{ $usernotification->receiver_id??''}}" >
        {!! $errors->first('receiver_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="col-md-4 control-label">{{ 'Type' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="type" type="text" id="type" value="{{ $usernotification->type??''}}" >
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $usernotification->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('redirect_url') ? 'has-error' : ''}}">
    <label for="redirect_url" class="col-md-4 control-label">{{ 'Redirect Url' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="redirect_url" type="text" id="redirect_url" value="{{ $usernotification->redirect_url??''}}" >
        {!! $errors->first('redirect_url', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('is_viewed_by_agent') ? 'has-error' : ''}}">
    <label for="is_viewed_by_agent" class="col-md-4 control-label">{{ 'Is Viewed By Agent' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="is_viewed_by_agent" type="text" id="is_viewed_by_agent" value="{{ $usernotification->is_viewed_by_agent??''}}" >
        {!! $errors->first('is_viewed_by_agent', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('is_viewed_by_admin') ? 'has-error' : ''}}">
    <label for="is_viewed_by_admin" class="col-md-4 control-label">{{ 'Is Viewed By Admin' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="is_viewed_by_admin" type="text" id="is_viewed_by_admin" value="{{ $usernotification->is_viewed_by_admin??''}}" >
        {!! $errors->first('is_viewed_by_admin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
