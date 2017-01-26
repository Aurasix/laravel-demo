<div class="row">
    <!-- Username Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('username', trans('users.field.username'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->username !!}</p>
    </div>

    <!-- Role Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('role', trans('users.field.role'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayLabelRole($user->role) !!}</p>
    </div>

    <!-- Photo Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('photo', trans('users.field.role'), ['class' => 'form-label semibold']) !!}
        @if(!empty($user->photo))
            <div class="img-circle center-block m-b-md" style="background: url('{!! asset($user->photo) !!}') no-repeat center;background-size: 100% 100%; height: 200px; width: 200px"></div>
        @endif
    </div>

    <!-- Firstname Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('firstName', trans('users.field.firstName'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->firstName !!}</p>
    </div>

    <!-- Lastname Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('lastName', trans('users.field.lastName'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->lastName !!}</p>
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', trans('users.field.email'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->email !!}</p>
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', trans('users.field.password'), ['class' => 'form-label semibold']) !!}
        <p><i class="glyphicon glyphicon-lock"></i>  Already Entered</p>
    </div>

    <!-- Activated Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('activated', trans('users.field.activated'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($user->activated) !!}</p>
    </div>

    <!-- Activationcode Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('activationCode', trans('users.field.activationCode'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->activationCode !!}</p>
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('address', trans('users.field.address'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->address !!}</p>
    </div>

    <!-- Aboutme Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('aboutMe', trans('users.field.aboutMe'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->aboutMe !!}</p>
    </div>

    <!-- Gender Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('gender', trans('users.field.gender'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayLabelGender($user->gender ) !!}</p>
    </div>

    <!-- Birthdate Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('birthdate', trans('users.field.birthdate'), ['class' => 'form-label semibold']) !!}
        <p>
            {{ $user->getBirthdate() }}
        </p>
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', trans('users.field.phone'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->phone !!}</p>
    </div>

    <!-- Mobilephone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('mobilePhone', trans('users.field.mobilePhone'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->mobilePhone !!}</p>
    </div>

    <!-- Facebookurl Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('facebookUrl', trans('users.field.facebookUrl'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->facebookUrl !!}</p>
    </div>

    <!-- Twitterurl Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('twitterUrl', trans('users.field.twitterUrl'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->twitterUrl !!}</p>
    </div>

    <!-- Googleplusurl Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('googlePlusUrl', trans('users.field.googlePlusUrl'), ['class' => 'form-label semibold']) !!}
        <p>{!! $user->googlePlusUrl !!}</p>
    </div>

    <!-- Receivenews Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('receiveNews', trans('users.field.receiveNews'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($user->receiveNews) !!}</p>
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('state', 'State', ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($user->state) !!}</p>
    </div>
</div>