<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $agent->name??''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="col-md-4 control-label">{{ 'Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="address" type="text" id="address" value="{{ $agent->address??''}}" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="col-md-4 control-label">{{ 'Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ $agent->phone??''}}" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('website') ? 'has-error' : ''}}">
    <label for="website" class="col-md-4 control-label">{{ 'Website' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="website" type="text" id="website" value="{{ $agent->website??''}}" >
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('brokerage_company') ? 'has-error' : ''}}">
    <label for="brokerage_company" class="col-md-4 control-label">{{ 'Brokerage Company' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="brokerage_company" type="text" id="brokerage_company" value="{{ $agent->brokerage_company??''}}" >
        {!! $errors->first('brokerage_company', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('brokerage_company_phone') ? 'has-error' : ''}}">
    <label for="brokerage_company_phone" class="col-md-4 control-label">{{ 'Brokerage Company Phone' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="brokerage_company_phone" type="text" id="brokerage_company_phone" value="{{ $agent->brokerage_company_phone??''}}" >
        {!! $errors->first('brokerage_company_phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('brokerage_company_address') ? 'has-error' : ''}}">
    <label for="brokerage_company_address" class="col-md-4 control-label">{{ 'Brokerage Company Address' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="brokerage_company_address" type="text" id="brokerage_company_address" value="{{ $agent->brokerage_company_address??''}}" >
        {!! $errors->first('brokerage_company_address', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $agent->email??''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="password" type="text" id="password" value="{{ $agent->password??''}}" >
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('license_number') ? 'has-error' : ''}}">
    <label for="license_number" class="col-md-4 control-label">{{ 'License Number' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="license_number" type="text" id="license_number" value="{{ $agent->license_number??''}}" >
        {!! $errors->first('license_number', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('license_state') ? 'has-error' : ''}}">
    <label for="license_state" class="col-md-4 control-label">{{ 'License State' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="license_state" type="text" id="license_state" value="{{ $agent->license_state??''}}" >
        {!! $errors->first('license_state', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('managing_broker_name') ? 'has-error' : ''}}">
    <label for="managing_broker_name" class="col-md-4 control-label">{{ 'Managing Broker Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="managing_broker_name" type="text" id="managing_broker_name" value="{{ $agent->managing_broker_name??''}}" >
        {!! $errors->first('managing_broker_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
