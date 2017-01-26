<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Session">
                <thead>
                <tr role="row">
                    <th>{{trans('sessions.field.id')}}</th>
                    <th>{{trans('sessions.field.user')}}</th>
                    <th>{{trans('sessions.field.token')}}</th>
                    <th>{{trans('sessions.field.ipAddress')}}</th>
                    <th>{{trans('sessions.field.browserName')}}</th>
                    <th>{{trans('sessions.field.deviceModel')}}</th>
                    <th>{{trans('sessions.field.engineName')}}</th>
                    <th>{{trans('sessions.field.osName')}}</th>
                    <th>{{trans('sessions.field.cpuArchitecture')}}</th>
                    <th>{{trans('sessions.field.state')}}</th>
                    <th>{{trans('common.column.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $session)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $session->id !!}</td>
                        <td><a href="{!! route('admin.users.show', [$session->id]) !!}">{!! $session->user->getFullName() !!}</a></td>
                        <td>{!! $session->token !!}</td>
                        <td>{!! $session->ipAddress !!}</td>
                        <td>{!! $session->browserName !!}</td>
                        <td>{!! $session->deviceModel !!}</td>
                        <td>{!! $session->engineName !!}</td>
                        <td>{!! $session->osName !!}</td>
                        <td>{!! $session->cpuArchiteture !!}</td>
                        <td>{!! Helper::displayActiveIconList($session->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.sessions.destroy', $session->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.sessions.show', [$session->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.sessions.edit', [$session->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
