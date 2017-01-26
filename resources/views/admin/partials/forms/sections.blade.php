{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- PageId Field -->
    <div class="form-group col-sm-12{{ $errors->has('pageId') ? ' error' : '' }}">
        {!! Form::label('pageId', trans('sections.field.page'), ['class' => 'form-label semibold']) !!}
        {!! Form::hidden('pageId', old('pageId')? old('pageId') : $section->pageId, ['id' => 'pageId', 'class' => 'form-control']) !!}
        <p>{!! Helper::getPageTitle($section->page) !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-12{{ $errors->has('title') ? ' error' : '' }}">
        {!! Form::label('title', trans('sections.field.title'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('title', old('title')? old('title') : $section->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('sections.placeholder.title')]) !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <!-- Type section Field -->
    <div class="form-group col-sm-12{{ $errors->has('typeSection') ? ' error' : '' }}">
        {!! Form::label('typeSection', trans('sections.field.typeSection'), ['class' => 'form-label semibold']) !!}
        {!! Form::select('typeSection', $typesSection, old('typeSection')? old('typeSection') : $section->typeSection, ['typeSection' => 'role', 'class' => 'form-control', 'placeholder' => trans('sections.placeholder.typeSection')]) !!}
        @if ($errors->has('typeSection'))
            <span class="help-block">
                <strong>{{ $errors->first('typeSection') }}</strong>
            </span>
        @endif
    </div>

    <!-- Content Field -->
    <div class="form-group col-sm-12{{ $errors->has('content') ? ' error' : '' }}">
        {!! Form::label('content', trans('sections.field.content'), ['class' => 'form-label semibold']) !!}
        {!! Form::textarea('content', old('content')? old('content') : $section->content, ['id' => 'content', 'class' => 'form-control summernote', 'placeholder' => trans('sections.placeholder.content')]) !!}
        @if ($errors->has('content'))
            <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12 text-right">
        <a href="{!! route('admin.pages.show', $section->pageId) !!}" class="btn btn-default">{{trans('common.button.cancel')}}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
