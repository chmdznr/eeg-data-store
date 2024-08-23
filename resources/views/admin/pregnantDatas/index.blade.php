@extends('layouts.admin')
@section('content')
    @can('pregnant_data_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pregnant-datas.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.pregnantData.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.pregnantData.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PregnantData">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.created_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.trial_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.gravidity') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.parity') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.hr') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.spo_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.resp_count') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.sistole') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.diastole') }}
                    </th>
                    <th>
                        {{ trans('cruds.pregnantData.fields.fetal_hr') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('pregnant_data_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.pregnant-datas.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.pregnant-datas.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'trial_code', name: 'trial_code'},
                    {data: 'name', name: 'name'},
                    {data: 'gravidity', name: 'gravidity'},
                    {data: 'parity', name: 'parity'},
                    {data: 'age', name: 'age'},
                    {data: 'hr', name: 'hr'},
                    {data: 'spo_2', name: 'spo_2'},
                    {data: 'resp_count', name: 'resp_count'},
                    {data: 'sistole', name: 'sistole'},
                    {data: 'diastole', name: 'diastole'},
                    {data: 'fetal_hr', name: 'fetal_hr'},
                    {data: 'actions', name: '{{ trans('global.actions') }}'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            };
            let table = $('.datatable-PregnantData').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function (e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function (colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        });

    </script>
@endsection
