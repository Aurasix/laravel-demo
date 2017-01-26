@extends('layouts.base')
@section('title')
    {{ trans('errors.404.title') }}
@endsection
@section('content')
    <div class="page-center">
        <div class="m-t-md">
            <div class="container-fluid">
                <div class="page-error-box">
                    <div class="error-code">{{ trans('errors.404.alias') }}</div>
                    <div class="error-title">{{ trans('errors.404.title') }}</div>
                    <a href="{{ route('dashboard') }}" class="btn btn-rounded">{{ trans('errors.404.button') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
