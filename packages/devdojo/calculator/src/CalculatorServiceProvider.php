<?php

namespace Devdojo\Calculator;

use Devdojo\Calculator\Services\ImageService;
use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->app->register(ImageServiceProvider::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->app->make('Devdojo\Calculator\Controllers\CalculatorController');
    }


}
