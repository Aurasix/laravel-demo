<div class="row">
    <!-- Userid Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('userId', trans('sessions.field.user'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::getRealFullname($session->user)  !!}</p>
    </div>

    <!-- Token Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('token', trans('sessions.field.token'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->token !!}</p>
    </div>

    <!-- Ipaddress Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ipAddress', trans('sessions.field.ipAddress'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->ipAddress !!}</p>
    </div>

    <!-- Useragent Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('userAgent', trans('sessions.field.userAgent'), ['class' => 'form-label semibold']) !!}
        <code>{!! $session->userAgent !!}</code>
    </div>

    <!-- Browsername Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('browserName', trans('sessions.field.browserName'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->browserName !!}</p>
    </div>

    <!-- Browserversion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('browserVersion', trans('sessions.field.browserVersion'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->browserVersion !!}</p>
    </div>

    <!-- Devicemodel Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('deviceModel', trans('sessions.field.deviceModel'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->deviceModel !!}</p>
    </div>

    <!-- Devicetype Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('deviceType', trans('sessions.field.deviceType'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->deviceType !!}</p>
    </div>

    <!-- Devicevendor Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('deviceVendor', trans('sessions.field.deviceVendor'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->deviceVendor !!}</p>
    </div>

    <!-- Enginename Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('engineName', trans('sessions.field.engineName'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->engineName !!}</p>
    </div>

    <!-- Engineversion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('engineVersion', trans('sessions.field.engineVersion'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->engineVersion !!}</p>
    </div>

    <!-- Osname Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('osName', trans('sessions.field.osName'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->osName !!}</p>
    </div>

    <!-- Osversion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('osVersion', trans('sessions.field.osVersion'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->osVersion !!}</p>
    </div>

    <!-- Cpuarchitecture Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('cpuArchitecture', trans('sessions.field.cpuArchitecture'), ['class' => 'form-label semibold']) !!}
        <p>{!! $session->cpuArchitecture !!}</p>
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('state', trans('sessions.field.state'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($session->state) !!}</p>
    </div>
</div>
