<?php

namespace App\DataTables;

use App\Models\delivery;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class deliveryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'delivery.action')
            ->addColumn('action', function($query){
                $editBtn ="<a href='".route('delivery.edit', $query->id)."'class='btn btn-primary '><i class='far fa-edit'></i></a>";
                $deleteBtn="<a href='".route('delivery.destroy', $query->id)."'class='btn btn-danger ml-2 delete-item'> <i class ='far fa-trash-alt'></i></a>";
                return $editBtn.$deleteBtn;
            })

            ->addColumn('status', function($query){
                if($query->status == 1){
                    $Button = '<label class="custom-switch mt-2">
                    <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status" >
                    <span class="custom-switch-indicator"></span>
                  </label>';
                 }else{
                    $Button = '<label class="custom-switch mt-2">
                    <input type="checkbox"name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input change-status">
                    <span class="custom-switch-indicator"></span>
                  </label>';
                }
                 return $Button;
            })

            ->addColumn('min_delivery_time', function($query){
                return $query->min_delivery_time.'min';
            })

            ->addColumn('max_delivery_time', function($query){
                return $query->max_delivery_time.'min';
            })

            ->addColumn('delivery_fee', function($query){
                return '€'.$query->delivery_fee;
            })

            ->rawColumns(['action','status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(delivery $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('delivery-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('area_name'),
            Column::make('min_delivery_time'),
            Column::make('max_delivery_time'),
            Column::make('delivery_fee'),
            Column::make('status'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'delivery_' . date('YmdHis');
    }
}
