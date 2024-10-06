<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Cart;
use Auth;
class MollieController extends Controller
{
    /*Mollie redirect*/
public function paymentWithMollie()
{


    $total =   grandCartTotal(session()->get('delivery_fee'));
    $invoice = generateInvoiceId();
    $payment = Mollie::api()->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => number_format($total,2,'.','')
        ],
        "description" => "OrderNummr:$invoice",

        "redirectUrl" => route('mollie.success'),
        "redirectUrl" => route('mollie.cancel'),
        //"webhookUrl" => route('webhooks.mollie'),
        "metadata" => [
            "order_id" => "OrderNummr: $invoice",
        ],
    ]);


  // redirect customer to Mollie checkout page
    return redirect($payment->getCheckoutUrl(), 303);
    session()->put('mollie_id', $payment->id);

}

public function success(Request $request){

    $paymentId  = session()->get('mollie_id');
    $payment = Mollie::api()->payments->get($paymentId);

    if ($payment->isPaid())
    {


    }

}


// public function cancel(){
//     toastr('somthing wrong try again', 'error', 'Error');
//     return redirect()->route('payment.index');
// }



}

