<div class="row">
    <!-- Userid Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('userId', trans('articles.field.userId'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::getRealFullname($article->user) !!}</p>
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('title', trans('articles.field.title'), ['class' => 'form-label semibold']) !!}
        <p>{!! $article->title !!}</p>
    </div>

    <!-- Categories Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('categories', trans('articles.field.categories'), ['class' => 'form-label semibold']) !!}
        {!! Helper::listingCategoryLabels($article->getCategories()->get()) !!}
    </div>

    <!-- Tags Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('tags', trans('articles.field.tags'), ['class' => 'form-label semibold']) !!}
        {!! Helper::listingTagLabels($article->getTags()->get()) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('description', trans('articles.field.description'), ['class' => 'form-label semibold']) !!}
        <p>{!! $article->description !!}</p>
    </div>

    <!-- State Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('state', trans('articles.field.state'), ['class' => 'form-label semibold']) !!}
        <p>{!! Helper::displayActiveIconShow($article->state) !!}</p>
    </div>
</div>
