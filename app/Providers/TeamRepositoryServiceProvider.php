<?php

namespace App\Providers;

use App\Repositories\Team\TeamRepository;
use App\Repositories\Team\TeamRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TeamRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TeamRepositoryInterface::class,
            TeamRepository::class

        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            TeamRepositoryInterface::class,
        ];
    }
}
