@extends('layouts.base-admin')
@section('title')
    Sections
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">Sections</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('flash::message')

                <h2 class="pull-left">Sections</h2>
                <a href="{!! route('admin.sections.create') !!}" class="btn btn-rounded btn-inline btn-primary-outline pull-right">
                    <i class="fa fa-plus"></i> Add New
                </a>

                @include('admin.partials.grids.sections')

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
