@extends('layouts.base-admin')
@section('title')
    {{trans('pages.title.edit')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.pages.index') }}">{{trans('pages.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('pages.breadcrumbs.edit')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{trans('pages.title.edit')}}</h5>

                @include('admin.partials.forms.pages', ['route' => ['admin.pages.update', $page->id], 'method' => 'patch'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
