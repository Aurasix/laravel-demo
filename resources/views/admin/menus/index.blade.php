@extends('layouts.base-admin')
@section('title')
    {{ trans('menus.title.index') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">{{ trans('menus.breadcrumbs.index') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h2 class="pull-left">{{ trans('menus.title.index') }}</h2>
                <a href="{!! route('admin.menus.create') !!}" class="btn btn-rounded btn-inline btn-primary-outline pull-right">
                    <i class="fa fa-plus"></i> {{ trans('common.button.create') }}
                </a>

                @include('admin.partials.grids.menus')

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
