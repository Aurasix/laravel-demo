@extends('layouts.base-admin')
@section('title')
    Create New Menu Item
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a href="{{ route('admin.menuItems.index') }}">Menu Items</a></li>
                    <li class="active">Create New</li>
                </ol>
            </div>
        </header>

        <section class="card">
            <div class="card-block">

                @include('admin.partials.common.errors')

                <h5 class="m-t-lg with-border">Create New Menu Item</h5>

                @include('admin.partials.forms.menuItem', ['route' => 'admin.menuItems.store', 'method' => 'post'])

            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
