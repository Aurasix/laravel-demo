<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
            <i class="font-icon-close-2"></i>
        </button>
        <h4 class="modal-title" id="myModalLabel">{!! $menu->title !!}</h4>
    </div>
    <div class="modal-body">
        <div class="row form">
            <div class="row col-sm-12">

                <!-- Menuid Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('title', trans('menuItems.field.title'), ['class' => 'form-label semibold']) !!}
                    <p id="title">{!! $menuItem->title !!}</p>
                </div>
            </div>
            <div class="row col-sm-12">
                <!-- Content Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('content', trans('menuItems.field.content'), ['class' => 'form-label semibold']) !!}
                    <p id="content" class="modal-pre">{!! $menuItem->content !!}</p>
                </div>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-rounded btn-default"
                data-dismiss="modal">{{trans('common.button.cancel')}}</button>
    </div>
</div>