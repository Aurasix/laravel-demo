<div class="col-xl-12">
    <section class="box-typical box-typical-dashboard">
        <header class="box-typical-header">
            <div class="tbl-row">
                <div class="tbl-cell tbl-cell-title">
                    <h3 style="font-size: 1.25rem;">
                        {{trans('sections.title.index')}}
                        <a href="{{ route('admin.sections.create',['pageId' => $page->id]) }}" role="button" class="btn btn-rounded btn-inline btn-primary button-new" ><i class="fa fa-plus"></i> {{trans('common.button.create')}}
                        </a>
                    </h3>
                </div>
            </div>
        </header>
        <div class="box-typical-body">
            <table class="tbl-typical">
                <tr>
                    <th>
                        <div>{{trans('sections.field.id')}}</div>
                    </th>
                    <th align="center">
                        <div>{{trans('sections.field.description')}}</div>
                    </th>
                    <th>
                        <div>{{trans('sections.field.title')}}</div>
                    </th>
                    <th align="center">
                        <div>{{trans('common.audit.createdAt')}}</div>
                    </th>
                    <th align="center">
                        <div>{{trans('common.column.action')}}</div>
                    </th>
                </tr>
                @foreach($sections as $section)
                    <tr>
                        <td>{!! $section->id !!}</td>
                        <td nowrap align="center">
                            <span class="label label-success">{!! $section->typeSection !!}</span>
                        </td>
                        <td>{!! $section->title !!}</td>
                        <td align="center">{!! $section->createdAt !!}</td>
                        <td nowrap align="center">
                            {!! Form::open(['route' => ['admin.sections.destroy', $section->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.sections.show', [$section->pageId, $section->id]) !!}" class='btn btn-inline btn-primary-outline'><i class="font-icon font-icon-eye"></i></a>
                            <a href="{!! route('admin.sections.edit', [$section->pageId, $section->id]) !!}" class='btn btn-inline btn-primary-outline'><i class="font-icon font-icon-pencil"></i></a>
                            {!! Form::button('<i class="font-icon font-icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-inline btn-danger-outline', 'onclick' => "return confirm('" . trans('common.column.confirmDelete') . "')"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</div>