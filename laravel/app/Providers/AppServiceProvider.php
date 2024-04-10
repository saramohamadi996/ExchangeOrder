<?php

namespace App\Providers;

use App\Repositories\ExchangeOrderRepository;
use App\Repositories\ExchangeOrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExchangeOrderRepositoryInterface::class,ExchangeOrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
