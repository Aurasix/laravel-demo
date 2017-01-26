@extends('layouts.base-admin')
@section('title')
    {{ trans('categories.title.create') }}
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
                    <li class="active">{{ trans('categories.title.create') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">{{ trans('categories.title.create') }}</h5>

                @include('admin.partials.forms.categories', ['route' => 'admin.categories.store', 'method' => 'post'])

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
