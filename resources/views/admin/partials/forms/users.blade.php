{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form', 'files' => true]) !!}
    <div class="row">
        <div class="col-sm-12">
            <!-- Username Field -->
            <div class="form-group col-sm-6{{ $errors->has('username') ? ' error' : '' }}">
                {!! Form::label('username', trans('users.field.username'), ['class' => 'form-label semibold']) !!}
                {!! Form::text('username', old('username')? old('username') : $user->username, ['id' => 'username', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.username')]) !!}
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Role Field -->
            <div class="form-group col-sm-6{{ $errors->has('role') ? ' error' : '' }}">
                {!! Form::label('role', trans('users.field.role'), ['class' => 'form-label semibold']) !!}
                {!! Form::select('role', $user->getAllRoles(), old('role')? old('role'): $user->role, ['id' => 'role', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.role')]) !!}
                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Photo Field -->
    <div class="form-group col-sm-12{{ $errors->has('image') ? ' error' : '' }}">
        {!! Form::label('photo', trans('users.field.photo'), ['class' => 'form-label semibold']) !!}
        {!! Form::file('image', ['id' => 'image', 'class' => 'form-control', 'accept' => 'image/*', 'style' => 'cursor:pointer']) !!}
        @if(!empty($user->photo))
            <div id="photoContent" style="position: relative">
                <div class="img-circle center-block m-t-md m-b-md" style="background: url('{!! asset($user->photo) !!}') no-repeat center;background-size: 100% 100%; height: 200px; width: 200px">
                    <span class="pull-right"><a href="javascript:void(0);" data-id="{{ $user->id }}" class="removePhoto"><i class="fa fa-trash" style="position: absolute"></i></a></span>
                </div>
            </div>
        @endif
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>

    <!-- Firstname Field -->
    <div class="form-group col-sm-6{{ $errors->has('firstName') ? ' error' : '' }}">
        {!! Form::label('firstName', trans('users.field.firstName'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('firstName', old('firstName')? old('firstName') : $user->firstName, ['id' => 'firstName', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.firstName')]) !!}
        @if ($errors->has('firstName'))
            <span class="help-block">
                <strong>{{ $errors->first('firstName') }}</strong>
            </span>
        @endif
    </div>

    <!-- Lastname Field -->
    <div class="form-group col-sm-6{{ $errors->has('lastName') ? ' error' : '' }}">
        {!! Form::label('lastName', trans('users.field.lastName'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('lastName', old('lastName')? old('lastName') : $user->lastName, ['id' => 'lastName', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.lastName')]) !!}
        @if ($errors->has('lastName'))
            <span class="help-block">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6{{ $errors->has('email') ? ' error' : '' }}">
        {!! Form::label('email', trans('users.field.email'), ['class' => 'form-label semibold']) !!}
        {!! Form::email('email', old('email')? old('email') : $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.email')]) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6{{ $errors->has('password') ? ' error' : '' }}">
        {!! Form::label('password', trans('users.field.password'), ['class' => 'form-label semibold']) !!}
        {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.password')]) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <!-- Activated Field -->
    <div class="form-group col-sm-6{{ $errors->has ('activated') ? ' error' : '' }}">
        {!! Form::label('activated', trans('users.field.activated'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('activated', 1, $user->activated, ['id' => 'activated']) !!}
            {!! Form::label('activated', ' ', ['class' => 'control-label semibold']) !!}
            @if ($errors->has('activated'))
                <span class="help-block">
                    <strong>{{ $errors->first('activated') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Activationcode Field -->
    <div class="form-group col-sm-6{{ $errors->has ('activationCode') ? ' error' : '' }}">
        {!! Form::label('activationCode', trans('users.field.activationCode'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('activationCode', old('activationCode')? old('activationCode') : $user->activationCode, ['id' => 'activationCode', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.activationCode')]) !!}
        @if ($errors->has('activationCode'))
            <span class="help-block">
                <strong>{{ $errors->first('activationCode') }}</strong>
            </span>
        @endif
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-12{{ $errors->has ('address')? ' error' : '' }}">
        {!! Form::label('address', trans('users.field.address'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('address', old('address')? old('address') : $user->address, ['id' => 'address', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.address')]) !!}
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>

    <!-- Aboutme Field -->
    <div class="form-group col-sm-12 col-lg-12{{ $errors->has ('aboutMe') ? ' error' : '' }}">
        {!! Form::label('aboutMe', trans('users.field.aboutMe'), ['class' => 'control-label semibold']) !!}
        {!! Form::textarea('aboutMe', old('aboutMe')? old('aboutMe') : $user->description, ['id' => 'aboutMe', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.aboutMe'), 'rows' => 4]) !!}
        @if ($errors->has('aboutMe'))
            <span class="help-block">
                <strong>{{ $errors->first('aboutMe') }}</strong>
            </span>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- Gender Field -->
            <div class="form-group col-sm-6{{ $errors->has ('gender')? ' error' : '' }}">
                {!! Form::label('gender', trans('users.field.gender'), ['class' => 'control-label semibold']) !!}
                {!! Form::select('gender', $user->getAllGenders(), old('gender')? old('gender') : $user->gender, ['id' => 'gender', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.gender')]) !!}
                @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Birthdate Field -->
            <div class="form-group col-sm-6{{ $errors->has ('gender')? ' error' : '' }}">
                {!! Form::label('birthdate', trans('users.field.birthdate'), ['class' => 'control-label semibold']) !!}
                <div class='input-group date datetimepicker-1'>
                    {!! Form::text('birthdate', old('birthdate')? old('birthdate') : $user->getBirthdate(), ['id' => 'birthdate', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.birthdate')]) !!}
                    <span class="input-group-addon">
                        <i class="font-icon font-icon-calend"></i>
                    </span>
                </div>
                @if ($errors->has('birthdate'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birthdate') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6{{ $errors->has ('phone')? ' error' : '' }}">
        {!! Form::label('phone', trans('users.field.phone'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('phone', old('phone')? old('phone') : $user->phone, ['id' => 'phone', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.phone')]) !!}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>

    <!-- Mobilephone Field -->
    <div class="form-group col-sm-6{{ $errors->has ('mobilePhone')? ' error' : '' }}">
        {!! Form::label('mobilePhone', trans('users.field.mobilePhone'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('mobilePhone', old('mobilePhone')? old('mobilePhone') : $user->mobilePhone, ['id' => 'mobilePhone', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.mobilePhone')]) !!}
        @if ($errors->has('mobilePhone'))
            <span class="help-block">
                <strong>{{ $errors->first('mobilePhone') }}</strong>
            </span>
        @endif
    </div>

    <!-- Facebookurl Field -->
    <div class="form-group col-sm-12{{ $errors->has ('facebookUrl')? ' error' : '' }}">
        {!! Form::label('facebookUrl', trans('users.field.facebookUrl'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('facebookUrl', old('facebookUrl')? old('facebookUrl') : $user->facebookUrl, ['id' => 'facebookUrl', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.facebookUrl')]) !!}
        @if ($errors->has('facebookUrl'))
            <span class="help-block">
                <strong>{{ $errors->first('facebookUrl') }}</strong>
            </span>
        @endif
    </div>

    <!-- Twitterurl Field -->
    <div class="form-group col-sm-12{{ $errors->has ('twitterUrl')? ' error' : '' }}">
        {!! Form::label('twitterUrl', trans('users.field.twitterUrl'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('twitterUrl', old('twitterUrl')? old('twitterUrl') : $user->twitterUrl, ['id' => 'twitterUrl', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.twitterUrl')]) !!}
        @if ($errors->has('twitterUrl'))
            <span class="help-block">
                <strong>{{ $errors->first('twitterUrl') }}</strong>
            </span>
        @endif
    </div>

    <!-- Googleplusurl Field -->
    <div class="form-group col-sm-12{{ $errors->has ('googlePlusUrl')? ' error' : '' }}">
        {!! Form::label('googlePlusUrl', trans('users.field.googlePlusUrl'), ['class' => 'control-label semibold']) !!}
        {!! Form::text('googlePlusUrl', old('googlePlusUrl')? old('googlePlusUrl') : $user->googlePlusUrl, ['id' => 'googlePlusUrl', 'class' => 'form-control', 'placeholder' => trans('users.placeholder.googlePlusUrl')]) !!}
        @if ($errors->has('googlePlusUrl'))
            <span class="help-block">
                <strong>{{ $errors->first('googlePlusUrl') }}</strong>
            </span>
        @endif
    </div>

    <!-- Receivenews Field -->
    <div class="form-group col-sm-6{{ $errors->has ('gender')? ' error' : '' }}">
        {!! Form::label('receiveNews', trans('users.field.receiveNews'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('receiveNews', 1, old('activated')? old('activated') : $user->activated, ['id' => 'receiveNews']) !!}
            {!! Form::label('receiveNews', ' ', ['class' => 'control-label semibold']) !!}
        </div>
        @if ($errors->has('receiveNews'))
            <span class="help-block">
                <strong>{{ $errors->first('receiveNews') }}</strong>
            </span>
        @endif
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6{{ $errors->has ('gender')? ' error' : '' }}">
        {!! Form::label('state', trans('users.field.state'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('state', 1, old('state')? old('state') : $user->state, ['id' => 'state']) !!}
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
        <a href="{!! route('admin.users.index') !!}" class="btn btn-default">{{ trans('common.button.cancel') }}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
