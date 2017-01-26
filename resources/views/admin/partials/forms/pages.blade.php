{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
<!-- Userid Field -->
<div class="form-group col-sm-12{{ $errors->has('userId') ? ' error' : '' }}">
    {!! Form::label('userId', trans('pages.field.user'), ['class' => 'form-label semibold']) !!}
    {!! Form::select('userId', $users, old('userId')? old('userId') : $page->userId, ['userId' => 'role', 'class' => 'form-control', 'placeholder' => trans('pages.placeholder.user')]) !!}
    @if ($errors->has('userId'))
        <span class="help-block">
                <strong>{{ $errors->first('userId') }}</strong>
            </span>
    @endif
</div>

<!-- Title Field -->
<div class="form-group col-sm-12{{ $errors->has('title') ? ' error' : '' }}">
    {!! Form::label('title', trans('pages.field.title'), ['class' => 'form-label semibold']) !!}
    {!! Form::text('title', old('title')? old('title') : $page->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('pages.placeholder.title')]) !!}
    @if ($errors->has('title'))
        <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12{{ $errors->has('description') ? ' error' : '' }}">
    {!! Form::label('description', trans('pages.field.description'), ['class' => 'form-label semibold']) !!}
    {!! Form::textarea('description', old('description')? old('description') : $page->description, ['id' => 'description', 'class' => 'form-control', 'placeholder' => trans('pages.placeholder.description'), 'rows' => 3]) !!}
    @if ($errors->has('description'))
        <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
    @endif
</div>

<!-- State Field -->
<div class="form-group col-sm-6{{ $errors->has ('state')? ' error' : '' }}">
    {!! Form::label('state', trans('pages.field.state'), ['class' => 'control-label semibold']) !!}
    <div class="checkbox-toggle">
        {!! Form::checkbox('state', 1, old('state')? old('state') : $page->state, ['id' => 'state']) !!}
        {!! Form::label('state', ' ', ['class' => 'control-label semibold']) !!}
    </div>
    @if ($errors->has('state'))
        <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <a href="{!! route('admin.pages.index') !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
    {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
