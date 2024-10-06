<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productVariant;
use App\DataTables\ProductVariantItemDataTable;
use App\Models\ProductVariantItem;
use Str;


class ProductVariantItemController extends Controller


{
    /**Index***/
    public function index(ProductVariantItemDataTable $dataTable, $productId){

        $product = product::findOrFail($productId);


        return $dataTable->render('admin.product.product-variant-item.index', compact('product'));
    }



    /*****Create*******/
    public function create(string $productId){


        $product = product::findOrFail($productId);

        return view('admin.product.product-variant-item.create',compact('product'));
    }

        /*****Store*******/

        public function store(Request $request){

            $request->validate([
            'product_id'=>['integer','required'],
            'name'=>['required'],
            'price'=>['integer','required'],
            'is_default'=>['required'],
            'status' =>['required']
         ]);

         $product = new ProductVariantItem();
         $product->product_id = $request->product_id;
         $product->name = $request->name;
         $product->price = $request->price;
         $product->is_default= $request->is_default;
         $product->status = $request-> status;
         $product->save();

         toastr('created successfully', 'success', 'success');
         return redirect()->route('products-variant-item.index',
         ['productId' => $request->product_id, 'variantId' => $request->variant_id]);


         }


         /*****Edit*******/

         public function edit(string $variantItemId){

            $variantItemId = ProductVariantItem::findOrFail($variantItemId);

            return view('admin.product.product-variant-item.edit',compact('variantItemId'));
         }

            /****Destroy****/
         public function destroy(string $variantItemId){

            $variantItem = ProductVariantItem::findOrFail($variantItemId);
            $variantItem->delete();
            return response(['status'=> 'success', 'message' =>'Deleted successufully']);
        }

         public function changeStatus(Request $request){

            $variantItem = ProductVariantItem::findOrFail($request->id);
            $variantItem->status = $request->status == 'true' ? 1 : 0;
            $variantItem->save;
            return response(['message'=>'status has been succsufully']);

          }



}
