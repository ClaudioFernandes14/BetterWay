<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        Validator::extend('adult', function ($attribute, $value, $parameters, $validator) {
            // calcula a idade do utilizador com base na data de nascimento fornecida
            $age = Carbon::parse($value)->age;

            // verifica se o utilizador tem pelo menos 18 anos de idade
            return $age >= 18;
        });
    }
}
