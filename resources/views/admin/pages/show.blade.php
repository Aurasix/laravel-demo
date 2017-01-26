@extends('layouts.base-admin')
@section('title')
    {{trans('pages.title.show')}}
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
                    <li class="active">{{trans('pages.breadcrumbs.show')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{trans('pages.title.show')}}</h5>

                @include('admin.partials.fields.pages')

                @include('admin.partials.grids.sections-alt', ['sections' => $sections, 'pages' => $pages, 'sectionObj' => $sectionObj, 'typesSection' => $typesSection])

                @include('admin.partials.audit.advanced', ['audit' => $page])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.pages.index') !!}"
                               class="btn btn-secondary">{{trans('common.button.back')}}</a>
                            <a href="{!! route('admin.pages.edit', $page->id) !!}"
                               class="btn btn-primary">{{trans('common.button.edit')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
