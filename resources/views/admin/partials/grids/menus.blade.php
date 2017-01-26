<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Menu">
                <thead>
                <tr role="row">
                    <th>Id</th>
                    <th>Title</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($menus as $menu)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $menu->id !!}</td>
                        <td>{!! $menu->title !!}</td>
                        <td>{!! Helper::displayActiveIconList($menu->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.menus.destroy', $menu->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.menus.show', [$menu->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{!! route('admin.menus.edit', [$menu->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
