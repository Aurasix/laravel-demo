<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Page">
                <thead>
                <tr role="row">
                    <th>{{ trans('pages.field.id') }}</th>
                    <th>{{ trans('pages.field.user') }}</th>
                    <th>{{ trans('pages.field.title') }}</th>
                    <th>{{ trans('pages.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $page->id !!}</td>
                        <td>{!! Helper::getRealFullname($page->user) !!}</td>
                        <td>{!! $page->title !!}</td>
                        <td>{!! Helper::displayActiveIconList($page->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.pages.destroy', $page->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.pages.show', [$page->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{!! route('admin.pages.edit', [$page->id]) !!}" class='btn btn-default btn-xs'>
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
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
