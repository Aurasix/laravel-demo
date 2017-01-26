{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- Email Field -->
    <div class="form-group col-sm-6{{ $errors->has('email') ? ' error' : '' }}">
        {!! Form::label('email', trans('password-resets.field.email'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('email', $passwordReset->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('password-resets.placeholder.email')]) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Token Field -->
    <div class="form-group col-sm-6{{ $errors->has('token') ? ' error' : '' }}">
        {!! Form::label('token', trans('password-resets.field.token'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('token', $passwordReset->token, ['id' => 'token', 'class' => 'form-control', 'placeholder' => trans('password-resets.placeholder.token')]) !!}
        @if ($errors->has('token'))
            <span class="help-block">
                <strong>{{ $errors->first('token') }}</strong>
            </span>
        @endif
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-right">
        <a href="{!! route('admin.password-resets.index') !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
