{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- Userid Field -->
    <div class="form-group col-sm-12{{ $errors->has('userId') ? ' error' : '' }}">
        {!! Form::label('userId', trans('sessions.field.user'), ['class' => 'form-label semibold']) !!}
        {!! Form::select('userId', $users, old('userId')? old('userId') : $session->userId, ['userId' => 'role', 'class' => 'form-control select2-icon', 'placeholder' => trans('sessions.placeholder.user'), 'ata-icon' => 'fa fa-user']) !!}
        @if ($errors->has('userId'))
            <span class="help-block">
                    <strong>{{ $errors->first('userId') }}</strong>
                </span>
        @endif
    </div>

    <!-- Token Field -->
    <div class="form-group col-sm-12{{ $errors->has('token') ? ' error' : '' }}">
        {!! Form::label('token', trans('sessions.field.token'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('token', old('token')? old('token') : $session->token, ['id' => 'token', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.token')]) !!}
        @if ($errors->has('token'))
            <span class="help-block">
                <strong>{{ $errors->first('token') }}</strong>
            </span>
        @endif
    </div>

    <!-- Ipaddress Field -->
    <div class="form-group col-sm-12{{ $errors->has('ipAddress') ? ' error' : '' }}">
        {!! Form::label('ipAddress', trans('sessions.field.ipAddress'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('ipAddress', old('ipAddress')? old('ipAddress') : $session->ipAddress, ['id' => 'ipAddress', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.ipAddress')]) !!}
        @if ($errors->has('ipAddress'))
            <span class="help-block">
                <strong>{{ $errors->first('ipAddress') }}</strong>
            </span>
        @endif
    </div>

    <!-- Useragent Field -->
    <div class="form-group col-sm-12 col-lg-12{{ $errors->has('userAgent') ? ' error' : '' }}">
        {!! Form::label('userAgent', trans('sessions.field.userAgent'), ['class' => 'form-label semibold']) !!}
        {!! Form::textarea('userAgent', old('userAgent')? old('userAgent') : $session->userAgent, ['id' => 'userAgent', 'placeholder' => trans('sessions.placeholder.userAgent'), 'class' => 'form-control', 'rows' => '4']) !!}
        @if ($errors->has('userAgent'))
            <span class="help-block">
                <strong>{{ $errors->first('userAgent') }}</strong>
            </span>
        @endif
    </div>

    <!-- Browsername Field -->
    <div class="form-group col-sm-6{{ $errors->has('browserName') ? ' error' : '' }}">
        {!! Form::label('browserName', trans('sessions.field.browserName'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('browserName', old('browserName')? old('browserName') : $session->browserName, ['id' => 'browserName', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.browserName')]) !!}
        @if ($errors->has('browserName'))
            <span class="help-block">
                <strong>{{ $errors->first('browserName') }}</strong>
            </span>
        @endif
    </div>

    <!-- Browserversion Field -->
    <div class="form-group col-sm-6{{ $errors->has('browserVersion') ? ' error' : '' }}">
        {!! Form::label('browserVersion', trans('sessions.field.browserVersion'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('browserVersion', old('browserVersion')? old('browserVersion') : $session->browserVersion, ['id' => 'browserVersion', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.browserVersion')]) !!}
        @if ($errors->has('browserVersion'))
            <span class="help-block">
                <strong>{{ $errors->first('browserVersion') }}</strong>
            </span>
        @endif
    </div>

    <!-- Devicemodel Field -->
    <div class="form-group col-sm-4{{ $errors->has('deviceModel') ? ' error' : '' }}">
        {!! Form::label('deviceModel', trans('sessions.field.deviceModel'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('deviceModel', old('deviceModel')? old('deviceModel') : $session->deviceModel, ['id' => 'deviceModel', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.deviceModel')]) !!}
        @if ($errors->has('deviceModel'))
            <span class="help-block">
                <strong>{{ $errors->first('deviceModel') }}</strong>
            </span>
        @endif
    </div>

    <!-- Devicetype Field -->
    <div class="form-group col-sm-4{{ $errors->has('deviceType') ? ' error' : '' }}">
        {!! Form::label('deviceType', trans('sessions.field.deviceType'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('deviceType', old('deviceType')? old('deviceType') : $session->deviceType, ['id' => 'deviceType', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.deviceType')]) !!}
        @if ($errors->has('deviceType'))
            <span class="help-block">
                <strong>{{ $errors->first('deviceType') }}</strong>
            </span>
        @endif
    </div>

    <!-- Devicevendor Field -->
    <div class="form-group col-sm-4{{ $errors->has('deviceVendor') ? ' error' : '' }}">
        {!! Form::label('deviceVendor', trans('sessions.field.deviceVendor'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('deviceVendor', old('deviceVendor')? old('deviceVendor') : $session->deviceVendor, ['id' => 'deviceVendor', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.deviceVendor')]) !!}
        @if ($errors->has('deviceVendor'))
            <span class="help-block">
                <strong>{{ $errors->first('deviceVendor') }}</strong>
            </span>
        @endif
    </div>

    <!-- Enginename Field -->
    <div class="form-group col-sm-6{{ $errors->has('engineName') ? ' error' : '' }}">
        {!! Form::label('engineName', trans('sessions.field.engineName'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('engineName', old('engineName')? old('engineName') : $session->engineName, ['id' => 'engineName', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.engineName')]) !!}
        @if ($errors->has('engineName'))
            <span class="help-block">
                <strong>{{ $errors->first('engineName') }}</strong>
            </span>
        @endif
    </div>

    <!-- Engineversion Field -->
    <div class="form-group col-sm-6{{ $errors->has('engineVersion') ? ' error' : '' }}">
        {!! Form::label('engineVersion', trans('sessions.field.engineVersion'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('engineVersion', old('engineVersion')? old('engineVersion') : $session->engineVersion, ['id' => 'engineVersion', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.engineVersion')]) !!}
        @if ($errors->has('engineVersion'))
            <span class="help-block">
                <strong>{{ $errors->first('engineVersion') }}</strong>
            </span>
        @endif
    </div>

    <!-- Osname Field -->
    <div class="form-group col-sm-6{{ $errors->has('osName') ? ' error' : '' }}">
        {!! Form::label('osName', trans('sessions.field.osName'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('osName', old('osName')? old('osName') : $session->osName, ['id' => 'osName', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.osName')]) !!}
        @if ($errors->has('osName'))
            <span class="help-block">
                <strong>{{ $errors->first('osName') }}</strong>
            </span>
        @endif
    </div>

    <!-- Osversion Field -->
    <div class="form-group col-sm-6{{ $errors->has('osVersion') ? ' error' : '' }}">
        {!! Form::label('osVersion', trans('sessions.field.osVersion'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('osVersion', old('osVersion')? old('osVersion') : $session->osVersion, ['id' => 'osVersion', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.osVersion')]) !!}
        @if ($errors->has('osVersion'))
            <span class="help-block">
                <strong>{{ $errors->first('osVersion') }}</strong>
            </span>
        @endif
    </div>

    <!-- Cpuarchitecture Field -->
    <div class="form-group col-sm-12{{ $errors->has('cpuArchitecture') ? ' error' : '' }}">
        {!! Form::label('cpuArchitecture', trans('sessions.field.cpuArchitecture'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('cpuArchitecture', old('cpuArchitecture')? old('cpuArchitecture') : $session->cpuArchitecture, ['id' => 'cpuArchitecture', 'class' => 'form-control', 'placeholder' => trans('sessions.placeholder.cpuArchitecture')]) !!}
        @if ($errors->has('cpuArchitecture'))
            <span class="help-block">
                <strong>{{ $errors->first('cpuArchitecture') }}</strong>
            </span>
        @endif
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6{{ $errors->has ('state')? ' error' : '' }}">
        {!! Form::label('state', trans('sessions.field.state'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('state', 1, old('state')? old('state') : $session->state, ['id' => 'state']) !!}
            {!! Form::label('state', ' ', ['class' => 'control-label semibold']) !!}
        </div>
        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-right">
        <a href="{!! route('admin.sessions.index') !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
