<div class="row">
    <!-- Userid Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('name', trans('categories.field.name'), ['class' => 'form-label semibold']) !!}
        <p>{!! $category->name !!}</p>
    </div>

    <!-- Body Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('description', trans('categories.field.description'), ['class' => 'form-label semibold']) !!}
        <p>{!! $category->description !!}</p>
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('state', trans('categories.field.state'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($category->state) !!}</p>
    </div>
</div>
