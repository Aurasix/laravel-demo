<div class="row">
    <!-- Pageid Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('pageId', trans('sections.field.page'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::getPageTitle($section->page) !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', trans('sections.field.title'), ['class' => 'form-label semibold']) !!}
        <p>{!! $section->title !!}</p>
    </div>

    <!-- Type section Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('typeSection', trans('sections.field.typeSection'), ['class' => 'form-label semibold']) !!}
        <p>{!! $section->typeSection !!}</p>
    </div>

    <!-- Content Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('content', trans('sections.field.content'), ['class' => 'form-label semibold']) !!}
        <div class="modal-pre">
            <p>{!! $section->content !!}</p>
        </div>
    </div>
</div>