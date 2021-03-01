<?php

namespace App\Providers;

use App\Services\CustomerService;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\MailService;
use App\Services\Interfaces\MailServiceInterface;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\MailRepositoryInterface;
use App\Repositories\MailRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Injected class in constructors
 */
class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {   
        // Repositories
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(MailRepositoryInterface::class, MailRepository::class);
        

        // Services
        $this->app->bind(CustomerServiceInterface::class, CustomerService::class);
        $this->app->bind(MailServiceInterface::class, MailService::class);
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
