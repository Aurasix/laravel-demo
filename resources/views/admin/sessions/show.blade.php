@extends('layouts.base-admin')
@section('title')
    {{trans('sessions.title.show')}}
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
                    <li class="active">{{trans('sessions.breadcrumbs.show')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{trans('sessions.title.show')}}</h5>

                @include('admin.partials.fields.sessions')

                @include('admin.partials.audit.normal', ['audit' => $session])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.sessions.index') !!}" class="btn btn-secondary">{{trans('common.button.back')}}</a>
                            <a href="{!! route('admin.sessions.edit', $session->id) !!}" class="btn btn-primary">{{trans('common.button.edit')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection

