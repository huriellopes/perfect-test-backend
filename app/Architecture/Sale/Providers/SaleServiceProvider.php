<?php

namespace App\Architecture\Sale\Providers;

use App\Architecture\Sale\Interfaces\ISaleRepository;
use App\Architecture\Sale\Interfaces\ISaleService;
use App\Architecture\Sale\Interfaces\IStatusRepository;
use App\Architecture\Sale\Interfaces\IStatusService;
use App\Architecture\Sale\Repositories\SaleRepository;
use App\Architecture\Sale\Repositories\StatusRepository;
use App\Architecture\Sale\Services\SaleService;
use App\Architecture\Sale\Services\StatusService;
use Illuminate\Support\ServiceProvider;

class SaleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            ISaleService::class,
            SaleService::class
        );

        $this->app->singleton(
            ISaleRepository::class,
            SaleRepository::class
        );

        $this->app->singleton(
            IStatusService::class,
            StatusService::class
        );

        $this->app->singleton(
            IStatusRepository::class,
            StatusRepository::class
        );
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
