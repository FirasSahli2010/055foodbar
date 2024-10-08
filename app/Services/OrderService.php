<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Cart;
class OrderService{

//**Store Order in database */
function createOrder(){

try{
    $order = new Order();
    $order->invoice_id = generateInvoiceId();
    $order->user_id = auth()->user()->id;
    $order->address = session()->get('address');
    $order->discount = session()->get('coupon')['discount'];
    $order->delivery_charge = session()->get('delivery_fee');
    $order->subtotal = cartTotal();
    $order->grand_total = grandCartTotal(session()->get('delivery_fee'));
    $order->product_qty = \Cart::content()->count();
    $order->payment_method = NULL;
    $order->payment_status = 'pending';
    $order->payment_approve_date = NULL;
    $order->transaction_id = NULL;
    $order->coupon_info = json_encode(session()->get('coupon'));
    $order->currency_name = NULL;
    $order->order_status = 'pending';
    $order->save();

    foreach(\Cart::content() as $product){
        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_name = $product->name;
        $orderItem->product_id = $product->id;
        $orderItem->unit_price = $product->price;
        $orderItem->qty = $product->qty;
        $orderItem->product_size = json_encode($product->options->product_size);
        $orderItem->product_option = json_encode($product->options->product_options);
        $orderItem->save();

    }
return true;
}catch(\Exception $e){
return false;
}


}

/* clear session Item*/

function clearSession(){


}

}


