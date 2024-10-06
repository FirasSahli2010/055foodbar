<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentGatewaySettingService;
class PaymentGetewaySettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentGatewaySettingService::class, function(){
            return new PaymentGatewaySettingService();

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }

}
