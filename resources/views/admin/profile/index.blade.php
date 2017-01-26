@extends('layouts.base-admin')
@section('title')
    {{ $admin->firstName.' '.$admin->lastName }} - {{ trans('profile.title.index') }}
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <ol class="breadcrumb breadcrumb-simple">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                    <li class="active">{{ trans('profile.title.index') }}</li>
                </ol>
            </div>
        </header>

        <section class="box-typical profile-side-user">
            <div class="profile-card">

                @include('flash::message')
            {!! Form::open(['route' => 'admin.profile.updatePhoto', 'method' => 'PATCH', 'role' => 'form', 'class' => 'row form', 'files' => true, 'id' => 'photoProfileForm']) !!}
                <button type="button" class="avatar-preview avatar-preview-128">
                    <img src="{!! $admin->getRealPhoto() !!}" alt=""><!-- Default image -->
                    <span class="update">
                        <i class="font-icon font-icon-picture-double"></i>
                        Update photo
                    </span>
                    {!! Form::file('image', ['id' => 'image', 'class' => 'form-control', 'accept' => 'image/*', 'style' => 'cursor:pointer']) !!}
                </button>
            {!! Form::close() !!}
                <div class="profile-card-name">{!! $admin->getFullname() !!}</div>
                <div class="profile-card-status"><a href="mailto:{!! $admin->email !!}">{!! $admin->email !!}</a></div>
                <div class="profile-card-status m-b-md">{!! Helper::displayLabelRole($admin->role) !!}</div>
                <a role="button" href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-primary">{{ trans('profile.title.edit') }}</a>
                <div class="profile-card-status" style="margin-top: 7px">
                    <a href="{{ route('admin.profile.changePassword') }}" style="margin-top: 417px"><i class="fa fa-btn fa-key"></i> {{ trans('profile.title.changePassword') }}</a>
                </div>
            </div><!--.profile-card-->

            <div class="profile-statistic tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <b style="font-size: 24px"><i class="glyphicon glyphicon-ok text-success text-lg"></i> <span hidden="">Visible</span></b>
                        {{ trans('common.audit.createdAt') }} <strong title="{{ (new Carbon($admin->createdAt))->format('d-m-Y h:i A') }}">{{ (new Carbon($admin->createdAt))->diffForHumans() }}</strong>
                    </div>
                </div>
            </div>
        </section>
        <section class="box-typical">
            <header class="box-typical-header-sm">{{ trans('profile.content.information') }}</header>
            <article class="profile-info-item">
                <header class="profile-info-item-header">
                    <i class="font-icon font-icon-notebook-bird"></i>
                    {{ trans('profile.field.aboutMe') }}
                </header>
                <div class="text-block text-block-typical">
                    {!! $admin->aboutMe !!}
                </div>
            </article><!--.profile-info-item-->

            <header class="box-typical-header-sm">{{ trans('profile.content.activity') }}</header>
        @if($activity['users']->count())
            <article class="profile-info-item">
                <header class="profile-info-item-header">
                    <i class="fa fa-users" aria-hidden="true"></i> {{ trans('users.title.index') }}
                </header>
                <ul class="exp-timeline">
                    @foreach($activity['users']->get() as $log)
                    {{--*/ $logRoute = route('users.show', [$log->id]) /*--}}
                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">{{ $log->getFullname() }}</div>
                                        <div class="exp-timeline-location" title="{{ (new Carbon($log->updatedAt))->format('d-m-Y h:i A') }}">{{ (new Carbon($log->updatedAt, 'America/Lima'))->diffForHumans() }}</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-logo">
                                        <a role="button" href="{{ $logRoute }}" class="btn btn-rounded btn-primary" target="_blank">{{ trans('common.button.view') }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <a href="{{ route('users.index') }}" class="btn btn-default">{{ trans('common.button.viewAll') }}</a>
                </div>
            </article>
        @endif
        <hr>
        @if($activity['contactMessages']->count())
            <article class="profile-info-item">
                <header class="profile-info-item-header">
                    <i class="fa fa-inbox" aria-hidden="true"></i> {{ trans('contact-messages.title.index') }}
                </header>
                <ul class="exp-timeline">
                    @foreach($activity['contactMessages']->get() as $log)
                        {{--*/ $logRoute = route('contact-messages.show', [$log->id]) /*--}}
                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">{{ $log->subject }}</div>
                                        <div class="exp-timeline-location" title="{{ (new Carbon($log->updatedAt))->format('d-m-Y h:i A') }}">{{ (new Carbon($log->updatedAt, 'America/Lima'))->diffForHumans() }}</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-logo">
                                        <a role="button" href="{{ $logRoute }}" class="btn btn-rounded btn-primary" target="_blank">{{ trans('common.button.view') }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <a href="{{ route('contact-messages.index') }}" class="btn btn-default">{{ trans('common.button.viewAll') }}</a>
                </div>
            </article>
        @endif
        <hr>
        @if($activity['articles']->count())
            <article class="profile-info-item">
                <header class="profile-info-item-header">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('articles.title.index') }}
                </header>
                <ul class="exp-timeline">
                    @foreach($activity['articles']->get() as $log)
                        {{--*/ $logRoute = route('articles.show', [$log->id]) /*--}}
                        <li class="exp-timeline-item">
                            <div class="dot"></div>
                            <div class="tbl">
                                <div class="tbl-row">
                                    <div class="tbl-cell">
                                        <div class="exp-timeline-range">{{ $log->title }}</div>
                                        <div class="exp-timeline-location" title="{{ (new Carbon($log->updatedAt))->format('d-m-Y h:i A') }}">{{ (new Carbon($log->updatedAt, 'America/Lima'))->diffForHumans() }}</div>
                                    </div>
                                    <div class="tbl-cell tbl-cell-logo">
                                        <a role="button" href="{{ $logRoute }}" class="btn btn-rounded btn-primary" target="_blank">{{ trans('common.button.view') }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    <a href="{{ route('articles.index') }}" class="btn btn-default">{{ trans('common.button.viewAll') }}</a>
                </div>
            </article>
        @endif
        <br>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#image').on('change', function() {
                $('#photoProfileForm').submit();
            });
        });
    </script>
@endsection
