{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- Name Field -->
    <div class="form-group col-sm-12{{ $errors->has('name') ? ' error' : '' }}">
        {!! Form::label('name', trans('contact-messages.field.name'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('name', old('name')? old('name') : $contactMessage->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('contact-messages.placeholder.name')]) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6{{ $errors->has('email') ? ' error' : '' }}">
        {!! Form::label('email', trans('contact-messages.field.email'), ['class' => 'form-label semibold']) !!}
        {!! Form::email('email', old('email')? old('email') : $contactMessage->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('contact-messages.placeholder.email')]) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Subject Field -->
    <div class="form-group col-sm-6{{ $errors->has('subject') ? ' error' : '' }}">
        {!! Form::label('subject', trans('contact-messages.field.subject'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('subject', old('subject')? old('subject') : $contactMessage->subject, ['id' => 'subject', 'class' => 'form-control', 'placeholder' => trans('contact-messages.placeholder.subject')]) !!}
        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>

    <!-- Body Field -->
    <div class="form-group col-sm-12 col-lg-12{{ $errors->has('body') ? ' error' : '' }}">
        {!! Form::label('body', trans('contact-messages.field.body'), ['class' => 'form-label semibold']) !!}
        {!! Form::textarea('body', old('body')? old('body') : $contactMessage->body, ['id' => 'body', 'class' => 'form-control', 'placeholder' => trans('contact-messages.placeholder.body'), 'rows' => 8]) !!}
        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6{{ $errors->has ('state')? ' error' : '' }}">
        {!! Form::label('state', trans('contact-messages.field.state'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('state', 1, old('state')? old('state') : $contactMessage->state, ['id' => 'state']) !!}
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
        <a href="{!! route('admin.contact-messages.index') !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
