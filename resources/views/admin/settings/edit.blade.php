@extends('layouts.base-admin')
@section('title')
    {{ trans('settings.title.edit') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.settings.index') }}">{{ trans('settings.title.index') }}</a></li>
                    <li class="active">{{ trans('settings.title.edit') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{ trans('settings.title.edit') }}</h5>

                @include('admin.partials.forms.settings', ['route' => 'settings.update', 'method' => 'patch'])

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
