<?php

namespace App\Architecture\Product\Providers;

use App\Architecture\Product\Interfaces\IProductRepository;
use App\Architecture\Product\Interfaces\IProductService;
use App\Architecture\Product\Repositories\ProductRepository;
use App\Architecture\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IProductService::class,
            ProductService::class
        );

        $this->app->singleton(
            IProductRepository::class,
            ProductRepository::class
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
