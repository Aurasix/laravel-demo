@extends('layouts.base-admin')
@section('title')
    {{trans('menus.title.show')}}
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
                    <li class="active"><a href="{{ route('admin.menus.index') }}">{{trans('menus.breadcrumbs.index')}}</a></li>
                    <li class="active">{{trans('menus.breadcrumbs.show')}}</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">{{trans('menus.title.show')}}</h5>

                @include('admin.partials.fields.menus')

                @include('admin.partials.grids.menu-items', ['menuItems' => $menuItems, 'menus' => $menus, 'menuItem' => $menuItem])

                @include('admin.partials.audit.advanced', ['audit' => $menu])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.menus.index') !!}" class="btn btn-secondary">{{trans('common.button.back')}}</a>
                            <a href="{!! route('admin.menus.edit', $menu->id) !!}" class="btn btn-primary">{{trans('common.button.edit')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/modals/menu-items.js') !!}
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
