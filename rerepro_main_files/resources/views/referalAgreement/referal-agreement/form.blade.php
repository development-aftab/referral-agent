<div class="form-group {{ $errors->has('lead_id') ? 'has-error' : ''}}">
    <label for="lead_id" class="col-md-4 control-label">{{ 'Lead Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lead_id" type="text" id="lead_id" value="{{ $referalagreement->lead_id??''}}" >
        {!! $errors->first('lead_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sender_id') ? 'has-error' : ''}}">
    <label for="sender_id" class="col-md-4 control-label">{{ 'Sender Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sender_id" type="text" id="sender_id" value="{{ $referalagreement->sender_id??''}}" >
        {!! $errors->first('sender_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('receiver_id') ? 'has-error' : ''}}">
    <label for="receiver_id" class="col-md-4 control-label">{{ 'Receiver Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="receiver_id" type="text" id="receiver_id" value="{{ $referalagreement->receiver_id??''}}" >
        {!! $errors->first('receiver_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $referalagreement->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
