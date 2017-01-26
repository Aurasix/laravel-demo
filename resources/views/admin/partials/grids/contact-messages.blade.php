<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Contact Message">
                <thead>
                <tr role="row">
                    <th>{{ trans('contact-messages.field.id') }}</th>
                    <th>{{ trans('contact-messages.field.name') }}</th>
                    <th>{{ trans('contact-messages.field.email') }}</th>
                    <th>{{ trans('contact-messages.field.subject') }}</th>
                    <th>{{ trans('contact-messages.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contactMessages as $contactMessage)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $contactMessage->id !!}</td>
                        <td>{!! $contactMessage->name !!}</td>
                        <td>{!! Helper::findRealContactEmail($contactMessage) !!}</td>
                        <td>{!! $contactMessage->subject !!}</td>
                        <td>{!! Helper::displayActiveIconList($contactMessage->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.contact-messages.destroy', $contactMessage->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.contact-messages.show', [$contactMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.contact-messages.edit', [$contactMessage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('" . trans('common.column.confirmDelete') . "')"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
