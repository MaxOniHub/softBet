<?php

namespace App\Providers;

use App\Interfaces\IEncryptor;
use App\Interfaces\IHasher;
use App\Services\CustomerService;
use App\Services\EncryptionService;
use App\Services\HashService;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IHasher::class, HashService::class);
        $this->app->bind(IEncryptor::class, EncryptionService::class);

        $this->app->make(CustomerService::class);
    }
}
