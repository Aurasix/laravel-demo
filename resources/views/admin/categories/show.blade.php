@extends('layouts.base-admin')
@section('title')
    {{ trans('categories.title.show') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.categories.index') }}">{{ trans('categories.title.index') }}</a></li>
                    <li class="active">{{ trans('categories.title.show') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{ trans('categories.title.show') }}</h5>

                @include('admin.partials.fields.categories')

                @include('admin.partials.audit.advanced', ['audit' => $category])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.categories.index') !!}" class="btn btn-secondary">{{ trans('common.button.back') }}</a>
                            <a href="{!! route('admin.categories.edit', $category->id) !!}" class="btn btn-primary">{{ trans('common.button.edit') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
