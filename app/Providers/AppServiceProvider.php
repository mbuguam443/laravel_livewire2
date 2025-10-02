<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::macro('toFormattedDate', function () {
            /** @var \Carbon\Carbon $this */
             return $this->format('Y-m-d');
        });
        Carbon::macro('toFormattedTime', function () {
            /** @var \Carbon\Carbon $this */
             return $this->format('h:i A');
        });
    }
}
