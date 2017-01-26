<div class="row">
    <hr>
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('createdBy', trans('common.audit.createdBy'), ['class' => 'form-label semibold']) !!}
            {{ $audit->createdBy }}
        </div>
    </div>
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('createdIp', trans('common.audit.createdIp'), ['class' => 'form-label semibold']) !!}
            {{ $audit->createdIp }}
        </div>
    </div>
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('createdAt', trans('common.audit.createdAt'), ['class' => 'form-label semibold']) !!}
            {{ $audit->createdAt->diffForHumans() }}
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('updatedBy', trans('common.audit.updatedBy'), ['class' => 'form-label semibold']) !!}
            {{ $audit->updatedBy }}
        </div>
    </div>
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('updatedIp', trans('common.audit.updatedIp'), ['class' => 'form-label semibold']) !!}
            {{ $audit->updatedIp }}
        </div>
    </div>
    <div class="form-group col-lg-4">
        <div class="form-group">
            {!! Form::label('updatedAt', trans('common.audit.updatedAt'), ['class' => 'form-label semibold']) !!}
            {{ $audit->updatedAt->diffForHumans() }}
        </div>
    </div>
</div>
