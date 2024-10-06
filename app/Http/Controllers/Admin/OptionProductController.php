<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productOption;
use App\DataTables\productOptionDataTable;
use Illuminate\Http\Request;

class OptionProductController extends Controller
{
    public function index(productOptionDataTable $dataTable, $productId){
        $product = product::findOrFail($productId);
        return $dataTable->render('admin.product.product-variant-options.index', compact('product'));
    }

      /*********create*******/

    public function create(string $productId){


        $product = product::findOrFail($productId);

        return view('admin.product.product-variant-options.create',compact('product'));
        }



        /*********store*******/
        public function store(Request $request){

            $request->validate([

                'name'=>['required'],
                'price'=>['integer','required'],
                'is_default'=>['required'],
                'status' =>['required']
             ]);
             $productoption = new productOption();

             $productoption->product_id = $request->product_id;
             $productoption->name = $request->name;
             $productoption->price = $request->price;
             $productoption->is_default= $request->is_default;
             $productoption->status = $request-> status;
             $productoption->save();

             toastr('created successfully', 'success', 'success');
             return redirect()->route('product-option-item.index',
             ['productId' => $request->product_id]);
         }


}
