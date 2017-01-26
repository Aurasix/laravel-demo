<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Password Reset">
                <thead>
                <tr role="row">
                    <th>{{ trans('password-resets.field.id') }}</th>
                    <th>{{ trans('password-resets.field.email') }}</th>
                    <th>{{ trans('password-resets.field.token') }}</th>
                    <th>{{ trans('password-resets.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($passwordResets as $passwordReset)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $passwordReset->id !!}</td>
                        <td><a href="{!! route('admin.password-resets.show', [$passwordReset->id]) !!}">{!! $passwordReset->email !!}</a></td>
                        <td>{!! $passwordReset->token !!}</td>
                        <td>{!! Helper::displayActiveIconList($passwordReset->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.password-resets.destroy', $passwordReset->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.password-resets.show', [$passwordReset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.password-resets.edit', [$passwordReset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
