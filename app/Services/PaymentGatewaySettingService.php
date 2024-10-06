<?php


namespace App\Services;

use App\Models\PaymentGatewaySettings;
use Cache;

class PaymentGatewaySettingService{

    function getSettings(){
        return Cache::rememberForever('gatewaySettings', function(){
        return PaymentGatewaySettings::pluck('value', 'key')->toArray();

        });

        function setGlobalSettings() : void{
            $settings = $this->getSettings();
            config()->set('gatewaySettings', $settings);

        }
    function ClearCachedSettings(){
        Cache::forget('gatewaySettings');
    }

    }


}
