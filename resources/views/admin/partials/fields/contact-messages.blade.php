<div class="row">
    <!-- Userid Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('userId', trans('contact-messages.field.name'), ['class' => 'form-label semibold']) !!}
        <p>{!! $contactMessage->name !!}</p>
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', trans('contact-messages.field.email'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::findRealContactEmail($contactMessage) !!}</p>
    </div>

    <!-- Subject Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('subject', trans('contact-messages.field.subject'), ['class' => 'form-label semibold']) !!}
        <p>{!! $contactMessage->subject !!}</p>
    </div>

    <!-- Body Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('body', trans('contact-messages.field.body'), ['class' => 'form-label semibold']) !!}
        <p>{!! $contactMessage->body !!}</p>
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('state', trans('contact-messages.field.state'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($contactMessage->state) !!}</p>
    </div>
</div>
