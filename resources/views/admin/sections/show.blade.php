@extends('layouts.base-admin')
@section('title')
    {{trans('sections.title.show')}}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.pages.show', $section->pageId) }}">{{trans('pages.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('sections.breadcrumbs.index')}}</li>
                    <li class="active">{{trans('sections.breadcrumbs.show')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{trans('sections.title.show')}}</h5>

                @include('admin.partials.fields.sections')

                @include('admin.partials.audit.normal', ['audit' => $section])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.pages.show', $section->pageId) !!}" class="btn btn-secondary">{{trans('common.button.back')}}</a>
                            <a href="{!! route('admin.sections.edit', [$section->pageId, $section->id]) !!}" class="btn btn-primary">{{trans('common.button.edit')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
