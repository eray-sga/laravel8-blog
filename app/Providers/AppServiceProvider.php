<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator; 

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\Config;
use App\Models\Page;

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
        
        view()->share('config',Config::find(1));
        Paginator::useBootstrap();
        Route::resourceVerbs([
            'create'=>'oluştur',
            'edit'=>'güncelle'
        ]);
    }
}
