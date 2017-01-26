<section class="widget card">
    <header class="widget-header-dark" style="text-align: left;">
        {{ trans('settings.content.general') }}
    </header>
    <div class="card-block">
        <div class="form-group row">
            {!! Form::label('contactEmail', trans('settings.field.contactEmail'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {{ Settings::get('contactEmail') }}
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('googleAnalytics', trans('settings.field.googleAnalytics'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    <code>{{ Settings::get('googleAnalytics') }}</code>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="widget card">
    <header class="widget-header-dark" style="background-color: #fdad2a; text-align: left;">
        {{ trans('settings.content.imageUpload') }}
    </header>
    <div class="card-block">
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('imageMaxUploadSize', trans('settings.field.imageMaxUploadSize'), ['class' => 'form-label semibold']) !!}
                    {{ Settings::get('imageMaxUploadSize') }}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('imageDisplayLimit', trans('settings.field.imageDisplayLimit'), ['class' => 'form-label semibold']) !!}
                    {{ Settings::get('imageDisplayLimit') }}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="widget card">
    <header class="widget-header-dark" style="background-color: #00a8ff; text-align: left;">
        {{ trans('settings.content.url') }}
    </header>
    <div class="card-block">
        <div class="form-group row">
            {!! Form::label('facebookUrl', trans('settings.field.facebookUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Settings::get('facebookUrl') !!}
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('twitterUrl', trans('settings.field.titterUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Settings::get('twitterUrl') !!}
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('instagramUrl', trans('settings.field.instagramUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Settings::get('instagramUrl') !!}
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('pinterestUrl', trans('settings.field.pinterestUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Settings::get('pinterestUrl') !!}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="widget card">
    <header class="widget-header-dark" style="background-color: #21a788; text-align: left;">
        {{ trans('settings.content.authentication') }}
    </header>
    <div class="card-block">
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('registerEnabled', trans('settings.field.registerEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('registerEnabled')) !!}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('loginEnabled', trans('settings.field.loginEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('loginEnabled')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('facebookRegisterEnabled', trans('settings.field.facebookRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('facebookRegisterEnabled')) !!}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('facebookLoginEnabled', trans('settings.field.facebookLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('facebookLoginEnabled')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('twitterRegisterEnabled', trans('settings.field.twitterRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('twitterRegisterEnabled')) !!}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('twitterLoginEnabled', trans('settings.field.twitterLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('twitterLoginEnabled')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('instagramRegisterEnabled', trans('settings.field.instagramRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('instagramRegisterEnabled')) !!}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('instagramLoginEnabled', trans('settings.field.instagramLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('instagramLoginEnabled')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('pinterestRegisterEnabled', trans('settings.field.pinterestRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('pinterestRegisterEnabled')) !!}
                </div>
            </div>
            <div class="form-group col-lg-6">
                <div class="form-group">
                    {!! Form::label('pinterestLoginEnabled', trans('settings.field.pinterestLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    {!! Helper::displayActiveIconShow(Settings::get('pinterestLoginEnabled')) !!}
                </div>
            </div>
        </div>
    </div>
</section>