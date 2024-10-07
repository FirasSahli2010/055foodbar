<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\support\Facades\View;
class InitialInformationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrap();
        $generalSetting = GeneralSetting::first();
        Config::set('app.timezone', $generalSetting->time_zone);

          /** share varaible at all view  */
          View::composer('*', function($view) use ($generalSetting){
            $view->with('settings',$generalSetting);
        });
    }
}
