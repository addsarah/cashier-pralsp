<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //script untuk tambah nilai mata uang
        Blade::directive('rupiah',function($expression){
            return "Rp. <? echo number_format($expression,0,',',','.'); ?>";
        });
    }
}
