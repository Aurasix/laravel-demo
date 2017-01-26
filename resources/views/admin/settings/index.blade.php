@extends('layouts.base-admin')
@section('title')
    {{ trans('settings.title.index') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">{{ trans('settings.title.index') }}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{ trans('settings.title.index') }}</h5>

                @include('admin.partials.fields.settings')

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.settings.edit') !!}" class="btn btn-primary">{{ trans('common.button.edit') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
