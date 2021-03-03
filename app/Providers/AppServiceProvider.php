<?php

namespace App\Providers;

use App\View\Components\Modal;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
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
        Blade::component(Modal::class, 'modal');
        Validator::extend('validaEmail', 'App\Rule\Email@valida', 'O e-mail informado não é válido!.');
        Validator::extend('validaCpf', 'App\Rule\Cpf@passes', 'O cpf informado é inválido.');
    }
}
