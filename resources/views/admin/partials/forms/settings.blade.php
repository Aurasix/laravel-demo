{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'form']) !!}
<section class="widget card">
    <header class="widget-header-dark" style="text-align: left;">
        {{ trans('settings.content.general') }}
    </header>
    <div class="card-block">
        <div class="form-group row{{ $errors->has('contactEmail') ? ' error' : '' }}">
            {!! Form::label('contactEmail', trans('settings.field.contactEmail'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::email('contactEmail', old('contactEmail')? old('contactEmail') : Settings::get('contactEmail'), ['id' => 'contactEmail', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.contactEmail')]) !!}
                    @if ($errors->has('contactEmail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contactEmail') }}</strong>
                        </span>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('googleAnalytics') ? ' error' : '' }}">
            {!! Form::label('googleAnalytics', trans('settings.field.googleAnalytics'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::textarea('googleAnalytics', old('googleAnalytics')? old('googleAnalytics') : Settings::get('googleAnalytics'), ['id' => 'googleAnalytics', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.googleAnalytics'), 'rows' => 5]) !!}
                    @if ($errors->has('googleAnalytics'))
                        <span class="help-block">
                            <strong>{{ $errors->first('googleAnalytics') }}</strong>
                        </span>
                    @endif
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
            <div class="form-group col-lg-6{{ $errors->has('imageMaxUploadSize') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('imageMaxUploadSize', trans('settings.field.imageMaxUploadSize'), ['class' => 'form-label semibold']) !!}
                    {!! Form::text('imageMaxUploadSize', old('imageMaxUploadSize')? old('imageMaxUploadSize') : Settings::get('imageMaxUploadSize'), ['id' => 'imageMaxUploadSize', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.imageMaxUploadSize')]) !!}
                    @if ($errors->has('imageMaxUploadSize'))
                        <span class="help-block">
                            <strong>{{ $errors->first('imageMaxUploadSize') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('imageDisplayLimit') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('imageDisplayLimit', trans('settings.field.imageDisplayLimit'), ['class' => 'form-label semibold']) !!}
                    {!! Form::text('imageDisplayLimit', old('imageDisplayLimit')? old('imageDisplayLimit') : Settings::get('imageDisplayLimit'), ['id' => 'imageDisplayLimit', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.imageDisplayLimit')]) !!}
                    @if ($errors->has('imageDisplayLimit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('imageDisplayLimit') }}</strong>
                        </span>
                    @endif
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
        <div class="form-group row{{ $errors->has('facebookUrl') ? ' error' : '' }}">
            {!! Form::label('facebookUrl', trans('settings.field.facebookUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::text('facebookUrl', old('facebookUrl')? old('facebookUrl') : Settings::get('facebookUrl'), ['id' => 'facebookUrl', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.facebookUrl')]) !!}
                    @if ($errors->has('facebookUrl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebookUrl') }}</strong>
                        </span>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('twitterUrl') ? ' error' : '' }}">
            {!! Form::label('twitterUrl', trans('settings.field.twitterUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::text('twitterUrl', old('twitterUrl')? old('twitterUrl') : Settings::get('twitterUrl'), ['id' => 'twitterUrl', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.twitterUrl')]) !!}
                    @if ($errors->has('twitterUrl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitterUrl') }}</strong>
                        </span>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('instagramUrl') ? ' error' : '' }}">
            {!! Form::label('instagramUrl', trans('settings.field.instagramUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::text('instagramUrl', old('instagramUrl')? old('instagramUrl') : Settings::get('instagramUrl'), ['id' => 'instagramUrl', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.instagramUrl')]) !!}
                    @if ($errors->has('instagramUrl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagramUrl') }}</strong>
                        </span>
                    @endif
                </p>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('pinterestUrl') ? ' error' : '' }}">
            {!! Form::label('pinterestUrl', trans('settings.field.pinterestUrl'), ['class' => 'col-sm-3 control-label semibold']) !!}
            <div class="col-sm-9">
                <p class="form_control-static">
                    {!! Form::text('pinterestUrl', old('pinterestUrl')? old('pinterestUrl') : Settings::get('pinterestUrl'), ['id' => 'pinterestUrl', 'class' => 'form-control', 'placeholder' => trans('settings.placeholder.pinterestUrl')]) !!}
                    @if ($errors->has('pinterestUrl'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pinterestUrl') }}</strong>
                        </span>
                    @endif
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
            <div class="form-group col-lg-6{{ $errors->has('registerEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('registerEnabled', trans('settings.field.registerEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('registerEnabled', 1, Settings::get('registerEnabled'), ['id' => 'registerEnabled']) !!}
                        {!! Form::label('registerEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('registerEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('registerEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('loginEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('loginEnabled', trans('settings.field.loginEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('loginEnabled', 1, Settings::get('loginEnabled'), ['id' => 'loginEnabled']) !!}
                        {!! Form::label('loginEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('loginEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('loginEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('facebookRegisterEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('facebookRegisterEnabled', trans('settings.field.facebookRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('facebookRegisterEnabled', 1, Settings::get('facebookRegisterEnabled'), ['id' => 'facebookRegisterEnabled']) !!}
                        {!! Form::label('facebookRegisterEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('facebookRegisterEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebookRegisterEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('facebookLoginEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('facebookLoginEnabled', trans('settings.field.facebookLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('facebookLoginEnabled', 1, Settings::get('facebookLoginEnabled'), ['id' => 'facebookLoginEnabled']) !!}
                        {!! Form::label('facebookLoginEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('facebookLoginEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('facebookLoginEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('twitterRegisterEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('twitterRegisterEnabled', trans('settings.field.twitterRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('twitterRegisterEnabled', 1, Settings::get('twitterRegisterEnabled'), ['id' => 'twitterRegisterEnabled']) !!}
                        {!! Form::label('twitterRegisterEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('twitterRegisterEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitterRegisterEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('twitterLoginEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('twitterLoginEnabled', trans('settings.field.twitterLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('twitterLoginEnabled', 1, Settings::get('twitterLoginEnabled'), ['id' => 'twitterLoginEnabled']) !!}
                        {!! Form::label('twitterLoginEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('twitterLoginEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('twitterLoginEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('instagramRegisterEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('instagramRegisterEnabled', trans('settings.field.instagramRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('instagramRegisterEnabled', 1, Settings::get('instagramRegisterEnabled'), ['id' => 'instagramRegisterEnabled']) !!}
                        {!! Form::label('instagramRegisterEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('instagramRegisterEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagramRegisterEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('instagramLoginEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('instagramLoginEnabled', trans('settings.field.instagramLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('instagramLoginEnabled', 1, Settings::get('instagramLoginEnabled'), ['id' => 'instagramLoginEnabled']) !!}
                        {!! Form::label('instagramLoginEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('instagramLoginEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('instagramLoginEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('pinterestRegisterEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('pinterestRegisterEnabled', trans('settings.field.pinterestRegisterEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('pinterestRegisterEnabled', 1, Settings::get('pinterestRegisterEnabled'), ['id' => 'pinterestRegisterEnabled']) !!}
                        {!! Form::label('pinterestRegisterEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('pinterestRegisterEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pinterestRegisterEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group col-lg-6{{ $errors->has('pinterestLoginEnabled') ? ' error' : '' }}">
                <div class="form-group">
                    {!! Form::label('pinterestLoginEnabled', trans('settings.field.pinterestLoginEnabled'), ['class' => 'form-label semibold']) !!}
                    <div class="checkbox-toggle">
                        {!! Form::checkbox('pinterestLoginEnabled', 1, Settings::get('pinterestLoginEnabled'), ['id' => 'pinterestLoginEnabled']) !!}
                        {!! Form::label('pinterestLoginEnabled', ' ', ['class' => 'control-label semibold']) !!}
                    </div>
                    @if ($errors->has('pinterestLoginEnabled'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pinterestLoginEnabled') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group text-right">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
