<?php

namespace App\Architecture\Client\Providers;

use App\Architecture\Client\Interfaces\IClientRepository;
use App\Architecture\Client\Interfaces\IClientService;
use App\Architecture\Client\Repositories\ClientRepository;
use App\Architecture\Client\Services\ClientService;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            IClientService::class,
            ClientService::class
        );

        $this->app->singleton(
            IClientRepository::class,
            ClientRepository::class
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
