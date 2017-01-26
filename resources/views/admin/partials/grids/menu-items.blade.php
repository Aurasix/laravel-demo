<div class="col-xl-12">
    <section class="box-typical box-typical-dashboard">
        <header class="box-typical-header">
            <div class="tbl-row">
                <div class="tbl-cell tbl-cell-title">
                    <h3 style="font-size: 1.25rem;">
                        {{trans('menus.title.index')}}
                        <button class="btn btn-rounded btn-inline btn-primary button-new" data-toggle="modal"
                                data-target="#modal-new">
                            <i class="fa fa-plus"></i> {{trans('common.button.create')}}
                        </button>

                    </h3>
                </div>
                {{--MODAL NEW--}}
                <div id="modal-new" class="modal fade bd-example-modal-lg"
                     tabindex="-1"
                     role="dialog"
                     aria-labelledby="myLargeModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        @include('admin.partials.forms.menu-items', ['route' => 'admin.menu-items.store', 'method' => 'post', 'menus' => $menus, 'menuItem' => $menuItem])
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical-body">
            <table class="tbl-typical">
                <tr>
                    <th>
                        <div>{{trans('menus.field.id')}}</div>
                    </th>
                    <th>
                        <div>{{trans('menus.field.title')}}</div>
                    </th>
                    <th align="center">
                        <div>{{trans('common.audit.createdAt')}}</div>
                    </th>
                    <th align="center">
                        <div>{{trans('common.column.action')}}</div>
                    </th>
                </tr>
                @foreach($menuItems as $menuItem)
                    <tr>
                        <td>{!! $menuItem->id !!}</td>
                        <td>{!! $menuItem->title !!}</td>
                        <td align="center">{!! $menuItem->createdAt !!}</td>
                        <td nowrap align="center">
                            {!! Form::open(['route' => ['admin.menu-items.destroy', $menuItem->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="font-icon font-icon-eye"></i>', ['type' => 'button', 'class' => 'btn btn-inline btn-primary-outline button-show', 'data-id' => "$menuItem->id", 'data-title' => "$menuItem->title", 'data-content' => "$menuItem->content", 'data-toggle' => "modal", 'data-target' => ".modal-show" ]) !!}
                            {!! Form::button('<i class="font-icon font-icon-pencil-thin"></i>', ['type' => 'button', 'class' => 'btn btn-inline btn-primary-outline button-edit', 'data-id' => "$menuItem->id", 'data-title' => "$menuItem->title", 'data-content' => "$menuItem->content", 'data-toggle' => "modal", 'data-target' => ".modal-edit"]) !!}
                            {!! Form::button('<i class="font-icon font-icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-inline btn-danger-outline', 'onclick' => "return confirm('" . trans('common.column.confirmDelete') . "')"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{--MODAL EDIT--}}
        <div class="modal fade bd-example-modal-lg modal-edit"
             tabindex="-1"
             role="dialog"
             aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                @include('admin.partials.forms.menu-items', ['route' => ['admin.menu-items.update', ''], 'method' => 'patch', 'menus' => $menus, 'menuItem' => $menuItem])
            </div>
        </div>
        {{--MODAL SHOW--}}
        <div class="modal fade bd-example-modal-lg modal-show"
             tabindex="-1"
             role="dialog"
             aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                @include('admin.partials.fields.menu-items', ['menuItem' => $menuItem])
            </div>
        </div>
    </section>
</div>
