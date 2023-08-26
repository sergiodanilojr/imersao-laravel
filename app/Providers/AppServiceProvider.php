<?php

namespace App\Providers;

use App\Repositories\Eloquent\Concretes\CategoryEloquentRepository;
use App\Repositories\Eloquent\Contracts\CategoryEloquentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(
           abstract: CategoryEloquentRepositoryInterface::class,
           concrete: CategoryEloquentRepository::class
       );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
