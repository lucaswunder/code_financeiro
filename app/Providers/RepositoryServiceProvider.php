<?php

namespace CodeFin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\CodeFin\Repositories\Interfaces\BankRepository::class, \CodeFin\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\BankAccountRepository::class, \CodeFin\Repositories\BankAccountRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\ClientRepository::class, \CodeFin\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\CategoryExpanseRepository::class, \CodeFin\Repositories\CategoryExpanseRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\CategoryRevenueRepository::class, \CodeFin\Repositories\CategoryRevenueRepositoryEloquent::class);
        $this->app->bind(\CodeFin\Repositories\Interfaces\BillPayRepository::class, \CodeFin\Repositories\BillPayRepositoryEloquent::class);
        //:end-bindings:
    }
}
