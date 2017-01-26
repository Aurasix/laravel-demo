{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- currentPassword Field -->
    <div class="form-group col-sm-12{{ $errors->has('currentPassword') ? ' error' : '' }}">
        {!! Form::label('currentPassword', trans('profile.field.currentPassword'), ['class' => 'form-label semibold']) !!}
        {!! Form::password('currentPassword', ['id' => 'currentPassword', 'class' => 'form-control', 'placeholder' => trans('profile.placeholder.currentPassword')]) !!}
        @if ($errors->has('currentPassword'))
            <span class="help-block">
                <strong>{{ $errors->first('currentPassword') }}</strong>
            </span>
        @endif
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-12{{ $errors->has('newPassword') ? ' error' : '' }}">
        {!! Form::label('newPassword', trans('profile.field.newPassword'), ['class' => 'form-label semibold']) !!}
        {!! Form::password('newPassword', ['id' => 'New Password', 'class' => 'form-control', 'placeholder' => trans('profile.placeholder.newPassword')]) !!}
        @if ($errors->has('newPassword'))
            <span class="help-block">
                <strong>{{ $errors->first('newPassword') }}</strong>
            </span>
        @endif
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-12{{ $errors->has('confirmPassword') ? ' error' : '' }}">
        {!! Form::label('confirmPassword', trans('profile.field.confirmPassword'), ['class' => 'form-label semibold']) !!}
        {!! Form::password('confirmPassword', ['id' => 'confirmPassword', 'class' => 'form-control', 'placeholder' => trans('profile.placeholder.confirmPassword')]) !!}
        @if ($errors->has('confirmPassword'))
            <span class="help-block">
                <strong>{{ $errors->first('confirmPassword') }}</strong>
            </span>
        @endif
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-right">
        <a href="{!! route('admin.profile.index') !!}" class="btn btn-default">{{ trans('common.button.cancel') }}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
