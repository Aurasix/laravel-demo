@extends('layouts.base-admin')
@section('title')
    {{ trans('translations.title.index') }}
@endsection
@section('styles')
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css') !!}
@endsection
@section('content')
<div class="container-fluid">
    <header class="section-header">
        <div class="tbl">
            <ol class="breadcrumb breadcrumb-simple">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                <li class="active">{{ trans('translations.title.index') }}</li>
            </ol>
        </div>
    </header>

    <section class="card">
        <div class="card-block">

            <h2>{{ trans('translations.title.index') }}</h2>
            <p>{{ trans('translations.content.warning') }}</p>
            <div class="alert alert-success success-import" style="display:none;">
                <p>Done importing, processed <strong class="counter">N</strong> items! Reload this page to refresh the groups!</p>
            </div>
            <div class="alert alert-success success-find" style="display:none;">
                <p>Done searching for translations, found <strong class="counter">N</strong> items!</p>
            </div>
            <div class="alert alert-success success-publish" style="display:none;">
                <p>Done publishing the translations for group '<?= $group ?>'!</p>
            </div>
            <?php if(Session::has('successPublish')) : ?>
            <div class="alert alert-info">
                <?php echo Session::get('successPublish'); ?>
            </div>
            <?php endif; ?>
            <p>
            <?php if(!isset($group)) : ?>
            <form class="form-inline form-import" method="POST" action="<?= action('TranslationController@postImport') ?>" data-remote="true" role="form">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <select name="replace" class="form-control">
                    <option value="0">{{ trans('translations.selector.append') }}</option>
                    <option value="1">{{ trans('translations.selector.replace') }}</option>
                </select>
                <button type="submit" class="btn btn-success"  data-disable-with="Loading..">{{ trans('translations.button.import') }}</button>
            </form>
            <form class="form-inline form-find" method="POST" action="<?= action('TranslationController@postFind') ?>" data-remote="true" role="form" data-confirm="Are you sure you want to scan you app folder? All found translation keys will be added to the database.">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <p></p>
                <button type="submit" class="btn btn-info" data-disable-with="Searching.." >{{ trans('translations.button.find') }}</button>
            </form>
            <?php endif; ?>
            <?php if(isset($group)) : ?>
            <form class="form-inline form-publish" method="POST" action="<?= action('TranslationController@postPublish', $group) ?>" data-remote="true" role="form" data-confirm="Are you sure you want to publish the translations group '<?= $group ?>? This will overwrite existing language files.">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit" class="btn btn-info" data-disable-with="Publishing.." >{{ trans('translations.button.publish') }}</button>
                <a href="<?= action('TranslationController@getIndex') ?>" class="btn btn-default">{{ trans('common.button.back') }}</a>
            </form>
            <?php endif; ?>
            </p>
            <form role="form">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group">
                    <select name="group" id="group" class="form-control group-select">
                        <?php foreach($groups as $key => $value): ?>
                        <option value="<?= $key ?>"<?= $key == $group ? ' selected':'' ?>><?= $value ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
            <?php if($group): ?>
            <form action="<?= action('TranslationController@postAdd', array($group)) ?>" method="POST"  role="form">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <textarea class="form-control" rows="3" name="keys" placeholder="{{ trans('translations.content.placeholder') }}"></textarea>
                <p></p>
                <input type="submit" value="{{ trans('translations.button.add') }}" class="btn btn-primary">
            </form>
            <hr>
            <h4>{{ trans('translations.content.total') }} <?= $numTranslations ?>, {{ trans('translations.content.changed') }} <?= $numChanged ?></h4>
            <table class="table">
                <thead>
                <tr>
                    <th width="15%">Key</th>
                    <?php foreach($locales as $locale): ?>
                    <th><?= $locale ?></th>
                    <?php endforeach; ?>
                    <?php if($deleteEnabled): ?>
                    <th>&nbsp;</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>

                <?php foreach($translations as $key => $translation): ?>
                <tr id="<?= $key ?>">
                    <td><?= $key ?></td>
                    <?php foreach($locales as $locale): ?>
                    <?php $t = isset($translation[$locale]) ? $translation[$locale] : null?>

                    <td>
                        <a href="#edit" class="editable status-<?= $t ? $t->status : 0 ?> locale-<?= $locale ?>" data-locale="<?= $locale ?>" data-name="<?= $locale . "|" . $key ?>" id="username" data-type="textarea" data-pk="<?= $t ? $t->id : 0 ?>" data-url="<?= $editUrl ?>" data-title="Enter translation"><?= $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '' ?></a>
                    </td>
                    <?php endforeach; ?>
                    <?php if($deleteEnabled): ?>
                    <td>
                        <a href="<?= action('TranslationController@postDelete', [$group, $key]) ?>" class="delete-key" data-confirm="{{ trans('translations.content.confirm') }} '<?= $key ?>?"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php else: ?>
            <p>{{ trans('translations.content.group') }}</p>

            <?php endif; ?>

        </div>
    </section>
</div><!--.container-fluid-->
@endsection
@section('scripts')
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js') !!}
    {!! Html::script('assets/js/lib/rails/rails.min.js') !!}

    <script>
        jQuery(document).ready(function($){

            $.ajaxSetup({
                beforeSend: function(xhr, settings) {
                    console.log('beforesend');
                    settings.data += "&_token=<?= csrf_token() ?>";
                }
            });

            $('.editable').editable().on('hidden', function(e, reason){
                var locale = $(this).data('locale');
                if(reason === 'save'){
                    $(this).removeClass('status-0').addClass('status-1');
                }
                if(reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable.locale-'+locale);
                    setTimeout(function() {
                        $next.editable('show');
                    }, 300);
                }
            });

            $('.group-select').on('change', function(){
                var group = $(this).val();
                if (group) {
                    window.location.href = '<?= action('TranslationController@getView') ?>/'+$(this).val();
                } else {
                    window.location.href = '<?= action('TranslationController@getIndex') ?>';
                }
            });

            $("a.delete-key").click(function(event){
                event.preventDefault();
                var row = $(this).closest('tr');
                var url = $(this).attr('href');
                var id = row.attr('id');
                $.post( url, {id: id}, function(){
                    row.remove();
                } );
            });

            $('.form-import').on('ajax:success', function (e, data) {
                $('div.success-import strong.counter').text(data.counter);
                $('div.success-import').slideDown();
            });

            $('.form-find').on('ajax:success', function (e, data) {
                $('div.success-find strong.counter').text(data.counter);
                $('div.success-find').slideDown();
            });

            $('.form-publish').on('ajax:success', function (e, data) {
                $('div.success-publish').slideDown();
            });

        })
    </script>
@endsection
