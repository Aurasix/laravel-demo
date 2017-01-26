@extends('layouts.base-admin')
@section('title')
    {{trans('menus.title.create')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.menus.index') }}">{{trans('menus.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('menus.breadcrumbs.create')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{trans('menus.title.create')}}</h5>

                @include('admin.partials.forms.menus', ['route' => 'admin.menus.store', 'method' => 'post'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection