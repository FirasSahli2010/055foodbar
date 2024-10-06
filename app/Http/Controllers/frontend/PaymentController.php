<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;
use Mollie\Laravel\Facades\Mollie;

class PaymentController extends Controller
{
    public function index()
    {
        if (!session()->has('delivery_fee') || !session()->has('address')) {
            throw  ValidationException::withMessages(['Somthing went wrong']);
        }
        $subtotal = cartTotal();
        $delivery = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $grantTotal = grandCartTotal($delivery);
        return view('frontend.payment.index', compact(
            'subtotal',
            'delivery',
            'discount',
            'grantTotal'
        ));
    }





    public function makePayment(Request $request, OrderService $orderService)
    {

        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal,mollie']
        ]);

        /** Create Order */
        if ($orderService->createOrder()) {
            // redirect user to the payment host
            switch ($request->payment_gateway) {
                case 'mollie':

                    return response(['redirect_url' => route('mollie.payment')]);
                    break;

                default:
                    break;
            }
        }
    }

    /*****PaywithMollie****/

    function payWithmollie()
    {

        $total =   grandCartTotal(session()->get('delivery_fee'));
        $invoice = generateInvoiceId();
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($total, 2, '.', '')
            ],

            "description" => "OrderNummr:$invoice",
            "redirectUrl" => route('mollie.success'),
            // "redirectUrl" => route('mollie.cancel'),
            // "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => "OrderNummr: $invoice",
            ],
        ]);
        session()->put('mollie_id', $payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId  = session()->get('mollie_id');
        $payment = Mollie::api()->payments->get($paymentId);
        if ($payment->isPaid()) {

            function paymentSuccess(): View
            {
                return view('frontend/payment.payment-success');
            }
        }else{
            function paymentCancel(): view
            {
                return view('frontend/payment.payment-cancel');
            }
        }



    }
}
