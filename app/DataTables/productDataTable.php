<?php

namespace App\DataTables;

use App\Models\product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class productDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {

        return (new EloquentDataTable($query))
        ->addColumn('action', function($query){
            $editBtn ="<a href='".route('products.edit', $query->id)."'class='btn btn-primary '><i class='far fa-edit'></i></a>";
            $deleteBtn="<a href='".route('products.destroy', $query->id)."'class='btn btn-danger ml-2 delete-item'> <i class ='far fa-trash-alt'></i></a>";

            $moreBtn ='<div class="dropdown dropleft d-inline show">
            <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item has-icon" href="'.route('products-image-gallery.index', ['product'=> $query->id]).'"><i class="far fa-heart"></i> Image-Gallery</a>
            <a class="dropdown-item has-icon" href="'.route('products-variant-item.index',['productId'=> $query->id]).'"><i class="far fa-file"></i>ٍSelect-Size</a>
            <a class="dropdown-item has-icon" href="'.route('product-option-item.index',['productId'=> $query->id]).'"><i class="far fa-file"></i>Select-Options</a>


            </div>
          </div>';
          return $editBtn.$deleteBtn.$moreBtn;
             })
             ->addColumn('thumb_image', function($query){
                return $img = "<img width='80px' src='".asset($query->thumb_image)."'></img>"; //opmerk
            })

            ->addColumn('price', function($query){
                return '€'.$query->price;
            })
            ->addColumn('price', function($query){
                return '€'.$query->price;
            })

            ->addColumn('offer_price', function($query){
                return '€'.$query->offer_price;
            })

            ->addColumn('category', function($query){
                return $query->category->name; // opmerk om de category naam beschikbaar
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


            ->rawColumns(['thumb_image','action','status','type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('thumb_image'),
            Column::make('name'),
            Column::make('category'),
            Column::make('price'),
            Column::make('offer_price'),
            Column::make('offer_start_date'),
            Column::make('offer_end_date'),
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
        return 'product_' . date('YmdHis');
    }
}
