<div class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
        <div class="col-sm-12 table-responsive">
            <table id="tableList" class="display table dataTable" data-title="Article">
                <thead>
                <tr role="row">
                    <th>{{ trans('articles.field.id') }}</th>
                    <th>{{ trans('articles.field.userId') }}</th>
                    <th>{{ trans('articles.field.title') }}</th>
                    <th>{{ trans('articles.field.categories') }}</th>
                    <th>{{ trans('articles.field.tags') }}</th>
                    <th>{{ trans('articles.field.state') }}</th>
                    <th>{{ trans('common.column.action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{!! $article->id !!}</td>
                        <td>{!! Helper::getRealFullname($article->user) !!}</td>
                        <td>{!! $article->title !!}</td>
                        <td>{!! Helper::displayCategoriesLabel($article->getCategories()) !!}</td>
                        <td>{!! Helper::displayTagsLabel($article->getTags()) !!}</td>
                        <td>{!! Helper::displayActiveIconList($article->state) !!}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.articles.destroy', $article->id], 'method' => 'delete']) !!}
                            <a href="{!! route('admin.articles.show', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{!! route('admin.articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
