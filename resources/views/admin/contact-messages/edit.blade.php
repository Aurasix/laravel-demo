@extends('layouts.base-admin')
@section('title')
    {{trans('contact-messages.title.edit')}}
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
                    <li class="active">{{trans('contact-messages.breadcrumbs.edit')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{trans('contact-messages.title.edit')}}</h5>

                @include('admin.partials.forms.contact-messages', ['route' => ['admin.contact-messages.update', $contactMessage->id], 'method' => 'patch'])

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
