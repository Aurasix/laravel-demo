{!! Form::open(['route' => $route, 'method' => $method, 'role' => 'form', 'class' => 'row form']) !!}
    <!-- Author Field -->
    <div class="form-group col-sm-12{{ $errors->has('userId') ? ' error' : '' }}">
        {!! Form::label('userId', trans('articles.field.userId'), ['class' => 'form-label semibold']) !!}
        {!! Form::select('userId', $users, old('userId')? old('userId') : $article->userId, ['userId' => 'role', 'class' => 'form-control select2-icon', 'placeholder' => trans('articles.placeholder.userId'), 'ata-icon' => 'fa fa-user']) !!}
        @if ($errors->has('userId'))
            <span class="help-block">
                <strong>{{ $errors->first('userId') }}</strong>
            </span>
        @endif
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-12{{ $errors->has('title') ? ' error' : '' }}">
        {!! Form::label('title', trans('articles.field.title'), ['class' => 'form-label semibold']) !!}
        {!! Form::text('title', old('title')? old('title') : $article->title, ['id' => 'title', 'class' => 'form-control', 'placeholder' => trans('articles.placeholder.title')]) !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>

    <!-- Category Field -->
    <div class="form-group col-sm-12{{ $errors->has('categories') ? ' error' : '' }}">
        {!! Form::label('categories', trans('articles.field.categories'), ['class' => 'form-label semibold']) !!}
        <div class="row">
        @foreach($categories as $category)
            <div class="col-sm-4">
                <div class="checkbox">
                    {!! Form::checkbox('categories[]', $category->id, $category->hasArticle($article->id), ['id' => 'category_' . $category->id]) !!}
                    {!! Form::label('category_' . $category->id, $category->name, ['class' => 'control-label semibold']) !!}
                </div>
            </div>
        @endforeach
        </div>
        @if ($errors->has('categories'))
            <span class="help-block">
                <strong>{{ $errors->first('categories') }}</strong>
            </span>
        @endif
    </div>

    <!-- Tag Field -->
    <div class="form-group col-sm-12{{ $errors->has('tags') ? ' error' : '' }}">
        {!! Form::label('tag', trans('articles.field.tags'), ['class' => 'form-label semibold']) !!}
        {!! Form::select('tags[]', $article->getTagsList(), old('tags')? old('tags') : $article->getTagsList(), ['tag' => 'role', 'class' => 'select2 form-control', 'placeholder' => trans('articles.placeholder.tags'), 'multiple' => 'multiple']) !!}
        @if ($errors->has('tags'))
            <span class="help-block">
                <strong>{{ $errors->first('tags') }}</strong>
            </span>
        @endif
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12 col-lg-12{{ $errors->has('description') ? ' error' : '' }}">
        {!! Form::label('description', trans('articles.field.description'), ['class' => 'form-label semibold']) !!}
        {!! Form::textarea('description', old('description')? old('description') : $article->description, ['id' => 'description', 'class' => 'form-control summernote', 'placeholder' => trans('articles.placeholder.description')]) !!}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-6{{ $errors->has ('state')? ' error' : '' }}">
        {!! Form::label('state', trans('articles.field.state'), ['class' => 'control-label semibold']) !!}
        <div class="checkbox-toggle">
            {!! Form::checkbox('state', 1, old('state')? old('state') : $article->state, ['id' => 'state']) !!}
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
        <a href="{!! route('admin.articles.index') !!}" class="btn btn-default">{{ trans('common.button.cancel') }}</a>
        {!! Form::submit(trans('common.button.save'), ['class' => 'btn btn-primary']) !!}
    </div>
{!! Form::close() !!}
