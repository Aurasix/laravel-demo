<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
            <i class="font-icon-close-2"></i>
        </button>
        <h4 class="modal-title" id="myModalLabel">{!! $page->title !!}</h4>
    </div>
    <div class="modal-body">

    {!! Form::open(['id' => 'form-edit','route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}

        <!-- PageId Field -->
        <div class="form-group col-sm-12{{ $errors->has('pageId') ? ' error' : '' }}">
            {!! Form::hidden('pageId', old('pageId')? old('pageId') : $sectionObj->pageId, ['id' => 'pageId', 'class' => 'form-control']) !!}
            @if ($errors->has('pageId'))
                <span class="help-block">
                    <strong>{{ $errors->first('pageId') }}</strong>
                </span>
            @endif
        </div>

        <div class="row col-sm-12">
            <!-- Title Field -->
            <div class="form-group col-sm-8{{ $errors->has('title') ? ' error' : '' }}">
                {!! Form::label('title', trans('sections.field.title'), ['class' => 'form-label semibold']) !!}
                {!! Form::text('title', old('title')? old('title') : $sectionObj->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('sections.placeholder.title')]) !!}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Type section Field -->
            <div class="form-group col-sm-4{{ $errors->has('typeSection') ? ' error' : '' }}">
                {!! Form::label('typeSection', trans('sections.field.typeSection'), ['class' => 'form-label semibold']) !!}
                {!! Form::select('typeSection', $typesSection, old('typeSection')? old('typeSection') : $sectionObj->typeSection, ['id' => 'typeSection', 'typeSection' => 'role', 'class' => 'form-control', 'placeholder' => trans('sections.placeholder.typeSection')]) !!}
                @if ($errors->has('typeSection'))
                    <span class="help-block">
                        <strong>{{ $errors->first('typeSection') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <!-- Content Field -->
        <div class="form-group col-sm-12 col-lg-12{{ $errors->has('content') ? ' error' : '' }}">
            {!! Form::label('content', trans('sections.field.content'), ['class' => 'form-label semibold']) !!}
            {!! Form::textarea('content', old('content')? old('content') : $sectionObj->content, ['id' => 'content', 'class' => 'form-control summernote', 'placeholder' => trans('sections.placeholder.content')]) !!}
            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Submit Field -->
    <div class="modal-footer">
        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">{{trans('common.button.cancel')}}</button>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-rounded btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>