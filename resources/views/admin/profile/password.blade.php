@extends('layouts.base-admin')
@section('title')
    {{ trans('profile.title.changePassword') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.profile.index') }}">{{ trans('profile.title.index') }}</a></li>
                    <li class="active">{{ trans('profile.title.changePassword') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{ trans('profile.title.changePassword') }}</h5>

                @include('admin.partials.forms.password', ['route' => ['admin.profile.updatePassword'], 'method' => 'patch'])

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
    {!! Html::script('assets/js/users.js') !!}
@endsection
