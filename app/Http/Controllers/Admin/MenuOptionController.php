<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\menuOptionDataTable;
use App\Models\Menu;
use App\Models\MenuOption;

class MenuOptionController extends Controller
{
    public function index(menuOptionDataTable $dataTable, $productId){
         $product = Menu::findOrFail($productId);
        return $dataTable->render('admin.product.menu.product-variant-options.index',compact('product'));

    }


    public function create(string $productId){


        $product = Menu::findOrFail($productId);

        return view('admin.product.menu.product-variant-options.create',compact('product'));
        }



             /*********store*******/
             public function store(Request $request){

                $request->validate([

                    'name'=>['required'],
                    'price'=>['integer','required'],
                    'is_default'=>['required'],
                    'status' =>['required']
                 ]);
                 $productoption = new MenuOption();

                 $productoption->product_id = $request->product_id;
                 $productoption->name = $request->name;
                 $productoption->price = $request->price;
                 $productoption->is_default= $request->is_default;
                 $productoption->status = $request-> status;
                 $productoption->save();

                 toastr('created successfully', 'success', 'success');
                 return redirect()->route('menu-option-item.index',
                 ['productId' => $request->product_id]);
             }

             public function edit(string $productId){

                $productoption = MenuOption::findOrFail($productId);
                $product = Menu::findOrFail($productId);

                return view('admin.product.product-variant-options.edit',compact('productoption','product'));
             }


                public function update(Request $request, string $productId){

                $request->validate([

                    'name'=>['required'],
                    'price'=>['integer','required'],
                    'is_default'=>['required'],
                    'status' =>['required']
                 ]);
                 $productoption = MenuOption::findOrFail($productId);

                 $productoption->product_id = $request->product_id;
                 $productoption->name = $request->name;
                 $productoption->price = $request->price;
                 $productoption->is_default= $request->is_default;
                 $productoption->status = $request-> status;
                 $productoption->save();

                 toastr('Updated successfully', 'success', 'success');
                 return redirect()->route('menu-option-item.index',
                 ['productId' => $request->product_id]);
             }


             public function destroy(string $id)
             {
                $productoption =  MenuOption::findOrFail($id);
                $productoption->delete();
                 return response(['status'=> 'success', 'message' =>'Deleted successufully']);
             }



             public function changeStatus(Request $request)
             {
                 $productoption = MenuOption::findOrFail($request->id);
                 $productoption->status = $request->status == 'true' ? 1 : 0;
                 $productoption->save();

                 return response(['message' => 'Status has been updated!']);
             }

}
