<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use CoinpaymentsAPI;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CoinpaymentsAPI::class, function () {
            return new CoinpaymentsAPI(env('COINPAYMENT_PRIVATE_KEY'), env('COINPAYMENT_PUBLIC_KEY'), 'json');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
