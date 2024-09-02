<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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

       if($this->app->environment('production')){
        URL::forceScheme('https');
       }

       Model::unguard();
       Paginator::useBootstrap();

        Validator::extend('cnpj_format', function ($attribute, $value, $parameters, $validator) {
                $value = preg_replace('/\D/', '', $value);

                return preg_match('/^\d{14}$/', $value);

        });
        Validator::replacer('cnpj_format', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, $message);
        });

    }
}
