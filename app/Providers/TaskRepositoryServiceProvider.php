<?php

namespace App\Providers;

use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TaskRepositoryServiceProvider extends ServiceProvider
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
            TaskRepositoryInterface::class,
            TaskRepository::class
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
            TaskRepositoryInterface::class,
        ];
    }
}
