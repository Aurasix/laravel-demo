<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="User">
                <thead>
                <tr role="row">
                    <th>{{ trans('users.field.id') }}</th>
                    <th>{{ trans('users.field.username') }}</th>
                    <th>{{ trans('users.field.role') }}</th>
                    <th>{{ trans('users.field.email') }}</th>
                    <th>{{ trans('users.field.firstName') }}</th>
                    <th>{{ trans('users.field.lastName') }}</th>
                    <th>{{ trans('users.field.activated') }}</th>
                    <th>{{ trans('users.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $user->id !!}</td>
                        <td><a href="{!! route('admin.users.show', [$user->id]) !!}">{!! $user->username !!}</a></td>
                        <td>{!! Helper::displayLabelRole($user->role) !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->firstName !!}</td>
                        <td>{!! $user->lastName !!}</td>
                        <td>{!! Helper::displayActiveIconList($user->activated) !!}</td>
                        <td>{!! Helper::displayActiveIconList($user->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                                <a href="{!! route('admin.users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                <a href="{!! route('admin.users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
