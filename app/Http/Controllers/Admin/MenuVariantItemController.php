<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\menuVariantItemDataTable;
use App\Models\menu;
use App\Models\MenuVariantitem;
use App\Models\product;

class MenuVariantItemController extends Controller
{
    public function index(menuVariantItemDataTable $dataTable, $productId)
    {
        $product = menu::findOrFail($productId);
        return $dataTable->render('admin.product.menu.product-variant-item.index', compact('product'));
    }

    public function create( string $productId){
        $product = menu::findOrFail($productId);

        return view('admin.product.menu.product-variant-item.create',compact('product'));
    }


    public function store(Request $request){

        $request->validate([
            'product_id'=>['integer','required'],
            'name'=>['required'],
            'price'=>['integer','required'],
            'is_default'=>['required'],
            'status' =>['required']
         ]);

         $product = new MenuVariantitem();
         $product->product_id = $request->product_id;
         $product->name = $request->name;
         $product->price = $request->price;
         $product->is_default= $request->is_default;
         $product->status = $request-> status;
         $product->save();

         toastr('created successfully', 'success', 'success');
         return redirect()->route('menu-variant-item.index',
         ['productId' => $request->product_id, 'variantId' => $request->variant_id]);

        }

        public function edit(string $variantItemId){

            $variantItemId = MenuVariantitem::findOrFail($variantItemId);
            return view('admin.product.menu.product-variant-item.edit',compact('variantItemId'));
         }


            /****update****/
            public function update(Request $request, string $variantItemId)

            {
                $request->validate([
                    'product_id'=>['integer','required'],
                    'name'=>['required'],
                    'price'=>['integer','required'],
                    'is_default'=>['required'],
                    'status' =>['required']
                 ]);

                $product =  MenuVariantitem::findorFail($variantItemId);
                $product->product_id = $request->product_id;
                $product->name = $request->name;
                $product->price = $request->price;
                $product->is_default= $request->is_default;
                $product->status = $request-> status;
                $product->save();

                 toastr('updated successfully', 'success', 'success');
                 return redirect()->route('menu-variant-item.index',
                 ['productId' => $request->product_id, 'variantId' => $request->variant_id]);

            }





            /****Destroy****/
            public function destroy(string $variantItemId){

                $variantItem = MenuVariantitem::findOrFail($variantItemId);
                $variantItem->delete();
                return response(['status'=> 'success', 'message'=>'Deleted successufully']);
            }

            public function changeStatus(Request $request){

                $variantItem = MenuVariantitem::findOrFail($request->id);
                $variantItem->status = $request->status == 'true' ? 1 : 0;
                $variantItem->save;
                return response(['message'=>'status has been succsufully']);

              }


}
