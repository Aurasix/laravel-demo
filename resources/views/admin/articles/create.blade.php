@extends('layouts.base-admin')
@section('title')
    {{ trans('articles.title.create') }}
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
                    <li class="active"><a href="{{ route('admin.articles.index') }}">{{ trans('articles.title.index') }}</a></li>
                    <li class="active">{{ trans('articles.title.create') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{ trans('articles.title.create') }}</h5>

                @include('admin.partials.forms.articles', ['route' => 'admin.articles.store', 'method' => 'post'])

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
    {!! Html::script('assets/js/lib/summernote/summernote.min.js') !!}
    {!! Html::script('assets/js/lib/select2/select2.full.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 150
            });
        });
    </script>
@endsection
