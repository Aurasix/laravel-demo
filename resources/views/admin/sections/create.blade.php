@extends('layouts.base-admin')
@section('title')
    {{trans('sections.title.create')}}
@endsection
@section('styles')
    {!! Html::style('assets/css/lib/summernote/summernote.css') !!}
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.pages.show', $section->pageId) }}">{{trans('pages.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('sections.breadcrumbs.index')}} </li>
                    <li class="active">{{trans('sections.breadcrumbs.create')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{trans('sections.title.create')}}</h5>

                @include('admin.partials.forms.sections', ['route' => 'admin.sections.store', 'method' => 'post'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/lib/summernote/summernote.min.js') !!}
    {!! Html::script('assets/js/lib/select2/select2.full.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
        });
    </script>
@endsection
