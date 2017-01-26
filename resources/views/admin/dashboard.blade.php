@extends('layouts.base-admin')
@section('title')
    :: Admin Manager ::
@endsection
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{ route('admin.articles.index') }}">
                <div class="col-md-3">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{ trans('articles.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.cms') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.categories.index') }}">
                <div class="col-md-3">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{ trans('categories.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.cms') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.pages.index') }}">
                <div class="col-md-3">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{ trans('pages.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.cms') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.menus.index') }}">
                <div class="col-md-3">
                    <article class="statistic-box red">
                        <div>
                            <div class="number">{{ trans('menus.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.cms') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.contact-messages.index') }}">
                <div class="col-sm-12">
                    <article class="statistic-box yellow">
                        <div>
                            <div class="number">{{ trans('contact-messages.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.contact-messages') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.users.index') }}">
                <div class="col-sm-12">
                    <article class="statistic-box green">
                        <div>
                            <div class="number">{{ trans('users.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.users') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.settings.index') }}">
                <div class="col-sm-3">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{ trans('settings.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.management') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.password-resets.index') }}">
                <div class="col-sm-3">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{ trans('password-resets.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.management') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ route('admin.sessions.index') }}">
                <div class="col-sm-3">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{ trans('sessions.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.management') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
            <a href="{{ action('TranslationController@getIndex') }}">
                <div class="col-sm-3">
                    <article class="statistic-box purple">
                        <div>
                            <div class="number">{{ trans('translations.title.index') }}</div>
                            <div class="caption"><div>{{ trans('common.modules.management') }}</div></div>
                        </div>
                    </article>
                </div><!--.col-->
            </a>
        </div><!--.row-->
    </div><!--.container-fluid-->
@endsection
@section('scripts')
@endsection
