@extends('layouts.base-admin')
@section('title')
    {{trans('contact-messages.title.show')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.contact-messages.index') }}">{{trans('contact-messages.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('contact-messages.breadcrumbs.show')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{trans('contact-messages.title.show')}}</h5>

                @include('admin.partials.fields.contact-messages')

                @include('admin.partials.audit.advanced', ['audit' => $contactMessage])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.contact-messages.index') !!}" class="btn btn-secondary">{{trans('common.button.back')}}</a>
                            <a href="{!! route('admin.contact-messages.edit', $contactMessage->id) !!}" class="btn btn-primary">{{trans('common.button.edit')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
