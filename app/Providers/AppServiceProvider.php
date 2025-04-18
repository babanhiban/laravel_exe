<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;   
use Illuminate\Support\Facades\Schema;

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
         // Route cho web (mặc định)
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // 👇 THÊM VÀO: Route cho auth (nếu chưa có)
        Route::middleware('web')
            ->group(base_path('routes/auth.php'));

        Schema::defaultStringLength(191);
    }

}
