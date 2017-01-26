@extends('layouts.base-admin')
@section('title')
    {{trans('sessions.title.create')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.sessions.index') }}">{{trans('sessions.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('sessions.breadcrumbs.create')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{trans('sessions.title.create')}}</h5>

                @include('admin.partials.forms.sessions', ['route' => 'admin.sessions.store', 'method' => 'post'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
