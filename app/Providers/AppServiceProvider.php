<?php

namespace App\Providers;

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
        //
    }

    
    public function booted(\Closure $callback): void
    {
        Route::middleware('web')
            ->middleware('verified') // Menambahkan middleware verified
            ->group(base_path('routes/web.php'));
    }
    
}
