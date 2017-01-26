<div class="row">
    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', trans('password-resets.field.email'), ['class' => 'form-label semibold']) !!}
        <p>{!! $passwordReset->email !!}</p>
    </div>

    <!-- Token Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('token', trans('password-resets.field.token'), ['class' => 'form-label semibold']) !!}
        <p>{!! $passwordReset->token !!}</p>
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-6">
        <div class="form-group">
            {!! Form::label('createdAt', trans('password-resets.field.createdAt'), ['class' => 'form-label semibold']) !!}
            {{ $passwordReset->created_at->diffForHumans() }}
        </div>
    </div>
    <div class="form-group col-lg-6">
        <div class="form-group">
            {!! Form::label('updatedAt', trans('password-resets.field.updatedAt'), ['class' => 'form-label semibold']) !!}
            {{ $passwordReset->updated_at->diffForHumans() }}
        </div>
    </div>
</div>

