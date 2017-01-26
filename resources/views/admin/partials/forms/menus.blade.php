{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}

<!-- Title Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('title', trans('menus.field.title'), ['class' => 'form-label semibold']) !!}
    {!! Form::text('title', old('title')? old('title') : $menu->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('menus.placeholder.title')]) !!}
    @if ($errors->has('title'))
        <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
    @endif
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', trans('menus.field.description'), ['class' => 'form-label semibold']) !!}
    {!! Form::textarea('description', old('description')? old('description') : $menu->description, ['id' => 'description', 'class' => 'form-control', 'placeholder' => trans('menus.placeholder.description'), 'rows' => 3]) !!}
    @if ($errors->has('description'))
        <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
    @endif
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', trans('menus.field.state'), ['class' => 'control-label semibold']) !!}
    <div class="checkbox-toggle">
        {!! Form::checkbox('state', 1, $menu->state, ['id' => 'state']) !!}
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
    <a href="{!! route('admin.menus.index') !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
