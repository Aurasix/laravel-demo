<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Section">
                <thead>
                <tr role="row">
                    <th>Id</th>
                    <th>Page</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $section->id !!}</td>
                        <td>{!! Helper::getSectionTitle($section->page) !!}</td>
                        <td>{!! $section->title !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.sections.destroy', $section->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.sections.show', [$section->pageId, $section->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.sections.edit', [$section->pageId, $section->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
