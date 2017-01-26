<div class="row">
    <div class="row col-sm-12">
        <!-- Title Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('title', trans('pages.field.title'), ['class' => 'form-label semibold']) !!}
            <p>{!! $page->title !!}</p>
        </div>
        <!-- Author Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('userId', trans('pages.field.user'), ['class' => 'form-label semibold']) !!}
            <p>{!! Helper::getRealFullname($page->user) !!}</p>
        </div>
    </div>

    <div class="row col-sm-12">
        <!-- Description Field -->
        <div class="form-group col-sm-8">
            {!! Form::label('description', trans('pages.field.description'), ['class' => 'form-label semibold']) !!}
            <p>{!! $page->description !!}</p>
        </div>

        <!-- State Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('state', trans('pages.field.state'), ['class' => 'form-label semibold']) !!}
            <p>{!! Helper::displayActiveIconShow($page->state) !!}</p>
        </div>
    </div>
</div>
