<?php

namespace HosseinHashemi\LaravelApiResponse;

use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('apiـresponse', function () {
            return new ApiResponse();
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/api-response.php',
            'api-response'
        );
    }

    
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/api-response.php' => config_path('api-response.php'),
        ], 'config');
    }

}
