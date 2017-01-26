<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Category">
                <thead>
                <tr role="row">
                    <th>{{ trans('categories.field.id') }}</th>
                    <th>{{ trans('categories.field.name') }}</th>
                    <th>{{ trans('categories.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $category->id !!}</td>
                        <td><a href="{!! route('admin.categories.show', [$category->id]) !!}">{!! $category->name !!}</a></td>
                        <td>{!! Helper::displayActiveIconList($category->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('" . trans('common.column.confirmDelete') . "')"]) !!}
                            {!! Form::close() !!}
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
