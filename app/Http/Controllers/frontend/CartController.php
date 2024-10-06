<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use App\Models\product;
use App\Models\ProductOption;
use App\Models\ProductVariantItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Response;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        try {
        $product = product::with(['productsize', 'productoption'])->findOrFail($request->product_id);
        $productSize = $product->productsize->where('id', $request->product_size)->first();
        $productoptions = $product->productoption->whereIn('id',$request->product_option);

        $options = [
           'product_size'=> [],
           'product_options' => [],
           'product_info' => [
            'image' => $product->thumb_image,
            'slug' =>  $product->slug
           ]

        ];
        if($productSize !== null){
            $options['product_size'] =[
                'id' =>   $productSize?->id,
                'name' => $productSize?->name,
                'price' => $productSize?->price
            ];
        }

        foreach($productoptions as $option){
            $options['product_options'][] =[
                'id'=> $option->id,
                'name' => $option->name,
                'price' => $option->price

            ];
        }

        Cart::add([
            'id' => $product->id,
            'name'=> $product->name,
            'qty' => $request->qty,
            'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
            'weight' => 0 ,
            'options' => $options

        ]);
            return response(['status' => 'success', 'message' => 'Product  toevoeged successfully:)']);
            }catch (\Exception $e){
           return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
    }


    }

    public function getCartProduct(){
     return view('frontend.pages.sidebar-cart-item')->render();
    }

    function cartProductRemove($rowId) {
        try {
            Cart::remove($rowId);
            return response([
                'status' => 'success',
                'message' => 'bestel has been removed!',
                'cart_total'=> cartTotal(),
                'grand_cart_total' => grandCartTotal()

            ], 200);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'Sorry something went wrong!'], 500);
        }


    }

    public function index(){
        return view('frontend.pages.cart-details');
    }


    public function cartQtyUpdate(Request $request){
        try {

            $cart= Cart::update($request->rowId, $request->qty);
            return response([
                'product_total' => productTotal($request->rowId),
                'qty' => $cart->qty,
                'cart_total' => cartTotal(),
                'grand_cart_total' => grandCartTotal()


        ],200);

        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'Somthing wrong'], 500);
        }
    }

    function cartDestroy(){
        Cart::destroy();
        session()->forget('coupon');
        return redirect()->back();
    }

}
