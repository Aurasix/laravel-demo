<div class="row">
    <div class="form-group col-lg-6">
        <div class="form-group">
            {!! Form::label('createdAt', trans('common.audit.createdAt'), ['class' => 'form-label semibold']) !!}
            {{ $audit->createdAt->diffForHumans() }}
        </div>
    </div>
    <div class="form-group col-lg-6">
        <div class="form-group">
            {!! Form::label('updatedAt', trans('common.audit.updatedAt'), ['class' => 'form-label semibold']) !!}
            {{ $audit->updatedAt->diffForHumans() }}
        </div>
    </div>
</div>
