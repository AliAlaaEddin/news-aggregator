<?php

namespace App\Providers;

use App\Vendors\NewsAPI\Services\NewsAPIService;
use App\Vendors\NewsProvidersManager;
use App\Vendors\TheGuardian\Services\TheGuardianService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(NewsProvidersManager::class, function () {
            $providers = [
                app(NewsAPIService::class),
                app(TheGuardianService::class),

            ];

            return new NewsProvidersManager($providers);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
