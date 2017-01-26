{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- Name Field -->
    <div class="form-group col-sm-12{{ $errors->has('name') ? ' error' : '' }}">
        {!! Form::label('name', trans('categories.field.name'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('name', old('name')? old('name') : $category->name, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('categories.placeholder.name')]) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12{{ $errors->has('description') ? ' error' : '' }}">
        {!! Form::label('description', trans('categories.field.description'), ['class' => 'form-label semibold']) !!}
        {!! Form::textarea('description', old('description')? old('description') : $category->description, ['id' => 'description', 'class' => 'form-control', 'placeholder' => trans('categories.placeholder.description'), 'rows' => 8]) !!}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6{{ $errors->has ('state')? ' error' : '' }}">
        {!! Form::label('state', trans('categories.field.state'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('state', 1, old('state')? old('state') : $category->state, ['id' => 'state']) !!}
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
        <a href="{!! route('admin.categories.index') !!}" class="btn btn-default">{{ trans('common.button.cancel') }}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
