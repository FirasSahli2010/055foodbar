<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentGatewaySettings;

class PaymentGatewaySettingsController extends Controller
{
    public function index()
    {
        $paymentGateway = PaymentGatewaySettings::pluck('value', 'key');
        return view('admin.payment-settings.index',compact('paymentGateway'));
    }

    public function paypalSettingUpdate(Request $request){

        $validateData = $request->validate([
            'paypal_status'=> ['required', 'boolean'],
            'paypal_account_mode' => ['required','in:sandbox,live'],
            'paypal_country' => ['required'],
            'paypal_currency'=>['required'],
            'paypal_rate' => ['required', 'numeric'],
            'paypal_api_key' => ['required'],
            'paypal_secret_key'=>['required'],
        ]);
        foreach($validateData as $key => $value){

            PaymentGatewaySettings::updateOrCreate(
                ['key' => $key],
                ['value'=> $value]
            );

        }
        toastr('updated Successufly','success', 'Success');
        return redirect()->back();

    }
}
