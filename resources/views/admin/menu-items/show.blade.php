@extends('layouts.base-admin')
@section('title')
    Show Section
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.menuItems.index') }}">Sections</a></li>
                    <li class="active">Show</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h5 class="m-t-lg with-border">Preview Section</h5>

                @include('admin.partials.fields.menu-items')

                @include('admin.partials.audit.normal', ['audit' => $menuItem])

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group text-right">
                            <a href="{!! route('admin.menuItems.index') !!}" class="btn btn-secondary">Back</a>
                            <a href="{!! route('admin.menuItems.edit', $menuItem->id) !!}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
