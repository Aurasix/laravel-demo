@extends('layouts.base')
@section('title')
    {{ trans('auth.login.title') }}
@endsection
@section('content')
<div class="page-center">
    <div class="m-t-md">
        <div class="container-fluid">
            {!! Form::open(['url' => 'login', 'method' => 'POST', 'role' => 'form', 'class' => 'sign-box']) !!}
            <div class="sign-avatar">
                <img src="{{ asset('assets/img/avatar-sign.png') }}" alt="">
            </div>
            <header class="sign-title">{{ trans('auth.login.alias') }}</header>
            <div class="form-group{{ $errors->has('email') ? ' error' : '' }}">
                {!! Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('auth.login.email')]) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' error' : '' }}">
                {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('auth.login.password')]) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="checkbox text-md-center">
                    <input type="checkbox" id="signed-in" name="remember"/>
                    <label for="signed-in">{{ trans('auth.login.reminder') }}</label>
                </div>
            </div>
            <button type="submit" class="btn btn-rounded">{{ trans('auth.login.title') }}</button>
            {!! Form::close() !!}
        </div>
    </div>
</div><!--.page-center-->
@endsection
