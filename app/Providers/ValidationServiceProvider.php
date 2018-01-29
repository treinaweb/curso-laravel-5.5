<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('dash2', function ($attribute, $value, $parameters, $validator) {
            //dd($attribute, $value, $parameters, $validator);
            return ! strpos($value, '-');
        });

        Validator::replacer('dash2', function ($message, $attribute, $rule, $parameters) {
            return "O campo {$attribute} não pode ter - (traços)";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
