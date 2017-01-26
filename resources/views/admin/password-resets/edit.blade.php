@extends('layouts.base-admin')
@section('title')
    {{trans('password-resets.title.edit')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.password-resets.index') }}">{{trans('password-resets.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('password-resets.breadcrumbs.edit')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('core-templates::common.errors')

                <h5 class="m-t-lg with-border">{{trans('password-resets.title.edit')}}</h5>

                @include('admin.partials.forms.password-resets', ['route' => ['admin.password-resets.update', $passwordReset->id], 'method' => 'patch'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
