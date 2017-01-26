<div class="row">
    <div class="row col-sm-12">
        <!-- Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('title', trans('menus.field.title'), ['class' => 'form-label semibold']) !!}
            <p>{!! $menu->title !!}</p>
        </div>

        <!-- State Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('state', trans('menus.field.state'), ['class' => 'form-label semibold']) !!}
            <p>{!! Helper::displayActiveIconShow($menu->state) !!}</p>
        </div>

    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('description', trans('menus.field.description'), ['class' => 'form-label semibold']) !!}
        <p>{!! $menu->description !!}</p>
    </div>

</div>