<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
/**check if de product dicsount heeft */

function checkDiscount($product)
{
    $currentDate = date('Y-m-d');

    if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }
    return false;
}


/****total cart price sidebar */
if(!function_exists('cartTotal')){

    function cartTotal(){
        $total = 0;

        foreach (Cart::content() as $item){

            $productPrice = $item->price;
            $sizePrice = $item->options?->product_size['price'] ?? 0;
            $optionsPrice = 0;
            foreach($item->options->product_options as $option){
            $optionsPrice += $option['price'];

            }
            $total += ($productPrice + $sizePrice + $optionsPrice) * $item->qty;

        }
        return $total;
}
}

/****total product cart page */
if(!function_exists('productTotal')){

    function productTotal($rowId)
    {
        $total = 0;

            $product= Cart::get($rowId);

            $productPrice = $product->price;

            $sizePrice = $product->options?->product_size['price'] ?? 0;
            $optionsPrice = 0;

            foreach($product->options->product_options as $option){
            $optionsPrice += $option['price'];

            }
            $total += ($productPrice + $sizePrice + $optionsPrice) * $product->qty;


        return $total;
}

}


/** grand cart total المبلغ النهائي */
if(!function_exists('grandCartTotal')){

    function grandCartTotal($deliveryFee = 0)
    {
        $total = 0;
       $cartTotal = cartTotal();
       if(session()->has('coupon')){
        $discount = session()->get('coupon')['discount'];
        $total = ($cartTotal  + $deliveryFee) - $discount;

        return $total;
       }else{
        $total = $cartTotal + $deliveryFee;
        return $total;
       }
    }

    /***Gererate Invoice ID***/
if(!function_exists('generateInvoiceId')){

    function generateInvoiceId()
    {
       $randomNumber = rand(1, 9999);
       $currentDateTime = now();
       $inoviceId = $randomNumber.$currentDateTime->format('yd').$currentDateTime->format('s');

       return $inoviceId;

    }
}

}
