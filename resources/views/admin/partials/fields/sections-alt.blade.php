<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
            <i class="font-icon-close-2"></i>
        </button>
        <h4 class="modal-title" id="myModalLabel">{!! $page->title !!}</h4>
    </div>
    <div class="modal-body">

        <div class="row form">

            <!-- Title Field -->
            <div class="row col-sm-12">
                <div class="form-group col-sm-6">
                    {!! Form::label('title', trans('sections.field.title'), ['class' => 'form-label semibold']) !!}
                    <p id="title">{!! $sectionObj->title !!}</p>
                </div>

                <!-- Type section Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('typeSection', trans('sections.field.typeSection'), ['class' => 'form-label semibold']) !!}
                    <p id="typeSection">{!! $sectionObj->typeSection !!}</p>
                </div>
            </div>

            <!-- Content Field -->
            <div class="row col-sm-12">
                <div class="form-group col-sm-12">
                    {!! Form::label('content', trans('sections.field.content'), ['class' => 'form-label semibold']) !!}
                    <p id="content" class="modal-pre" >{!! $sectionObj->content !!}</p>
                </div>
            </div>
        </div>


    </div>

    <div class="modal-footer" style="padding-top: 5%;">
        <button type="button" class="btn btn-rounded btn-default"
                data-dismiss="modal">{{trans('common.button.cancel')}}</button>
    </div>
</div>