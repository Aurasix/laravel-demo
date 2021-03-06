@extends('layouts.base-admin')
@section('title')
    {{ trans('sessions.title.index') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">{{ trans('sessions.breadcrumbs.index') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h2 class="pull-left">{{ trans('sessions.title.index') }}</h2>
                <a href="{!! route('admin.sessions.create') !!}" class="btn btn-rounded btn-inline btn-primary-outline pull-right">
                    <i class="fa fa-plus"></i> {{ trans('common.button.create') }}
                </a>

                @include('admin.partials.grids.sessions')

            </div>
        </section>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/lib/datatables-net/datatables.min.js') !!}
    {!! Html::script('assets/js/custom-list.js') !!}
@endsection
