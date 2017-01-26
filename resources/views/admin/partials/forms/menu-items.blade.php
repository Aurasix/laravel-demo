{!! Form::open(['id' => 'form-edit', 'route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
            <i class="font-icon-close-2"></i>
        </button>
        <h4 class="modal-title" id="myModalLabel">{!! $menu->title !!}</h4>
    </div>
    <div class="modal-body">
        <!-- MenuId Field -->
        <div class="form-group col-sm-12{{ $errors->has('menuId') ? ' error' : '' }}">
            {!! Form::hidden('menuId', old('menuId')? old('menuId') : $menuItem->menuId, ['id' => 'menuId', 'class' => 'form-control']) !!}

            @if ($errors->has('menuId'))
                <span class="help-block"><strong>{{ $errors->first('menuId') }}</strong></span>
            @endif
        </div>

        <!-- Title Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('title', trans('menuItems.field.title'), ['class' => 'form-label semibold']) !!}
            {!! Form::text('title', old('title')? old('title') : $menuItem->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('menuItems.placeholder.title')]) !!}
            @if ($errors->has('title'))
                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
            @endif
        </div>

        <!-- Content Field -->
        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::label('content', trans('menuItems.field.content'), ['class' => 'form-label semibold']) !!}
            {!! Form::textarea('content', old('content')? old('content') : $menuItem->content, ['id' => 'content', 'class' => 'form-control summernote', 'placeholder' => trans('menuItems.placeholder.content')])!!}
            @if ($errors->has('content'))
                <span class="help-block"><strong>{{ $errors->first('content') }}</strong></span>
            @endif
        </div>
    </div>

    <!-- Submit Field -->
    <div class="modal-footer">
        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">{{trans('common.button.cancel')}}</button>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-rounded btn-primary']) !!}
    </div>
</div>
{!! Form::close() !!}
