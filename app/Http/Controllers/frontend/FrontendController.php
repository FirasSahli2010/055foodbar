<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\about;
use App\Models\category;
use App\Models\coupon;
use App\Models\slider;
use App\Models\product;
use App\Models\productImageGallery;
use App\Models\ProductOption;
use App\Models\Reservation;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;
use Session;

class FrontendController extends Controller
{
    public function index()
    {

        $slider = slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $about = about::where('status', 1)->get();
        $categories = category::where('status', 1)->get();


        return view('frontend.home.index', compact('slider', 'about', 'categories'));
    }

    public function showProduct(string $slug)
    {
        $product = product::with(
            [
                            'category', 
                            'ProductImageGalleries', 
                            'productoption', 
                            'productsize'
                        ])
                        ->where('slug', $slug)
                        ->where('status', 1)
                        ->first();
        /**لعرض نفس المنتجات الشبيهه بالمنتج */
        $relatedProducts = product::where('category_id', $product->category_id)
                                    ->where('id', '!=', $product->id)
                                    
                                    ->latest()
                                    ->get();

                                    // ->take(8)
        return view('frontend.pages.product-detail', compact('product', 'relatedProducts'));
    }


    public function loadProductModal($productId)
    {
        $product = product::with('productsize', 'productoption')->findorFail($productId);
        return view('frontend.pages.product-pop-cart', compact('product'))->render();
    }

    function applyCoupon(Request $request): Response
    {

        $subtotal = $request->subtotal;
        $code = $request->code;

        $coupon = coupon::where('code', $code)->first();
        if (!$coupon) {
            return response(['message' => ' code ongeldig'], 422);
        }
        if($coupon->quantity <= 0){
            return response(['message' => ' code ongeldig'], 422);
        }

        if($coupon->end_date < now() ){
            return response(['message' => ' code datum niet meer  ongeldig'], 422);

        }
        if($coupon->discount_type === 'percent'){
            $discount = number_format($subtotal * ($coupon->discount /100), 2);
        }elseif ($coupon->discount_type === 'amount'){
            $discount = number_format($coupon->discount, 2);
        }

        $finalTotal = $subtotal - $discount;

        session()->put('coupon', ['code' => $code, 'discount'=> $discount]);

        return response(['message'=>'Korting succesvol toegepast',
        'discount' => $discount,
        'finalTotal'=> $finalTotal,
        'coupon_code'=> $code]);

    }

    //reservation





    function destroyCoupon(){
        try{
            session()->forget('coupon');
            return response(['message' => 'korting-code Removed', 'grand_cart_total' => grandCartTotal()]);
        }catch(\Exception $e){

            return response(['message' => 'Somthing went wrong!']);
        }


    }



}
