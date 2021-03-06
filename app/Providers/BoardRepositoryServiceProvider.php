<?php

namespace App\Providers;

use App\Repositories\Board\BoardRepository;
use App\Repositories\Board\BoardRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BoardRepositoryServiceProvider extends ServiceProvider
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
            BoardRepositoryInterface::class,
            BoardRepository::class
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
            BoardRepositoryInterface::class,
        ];
    }
}
