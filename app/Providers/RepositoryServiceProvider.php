<?php

namespace App\Providers;

use App\Interfaces\Project\IProjectRepository;
use App\Interfaces\Task\ITaskRepository;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // ProjectRepository registration
        $this->app->singleton(IProjectRepository::class, ProjectRepository::class);

        // TaskRepository registration
        $this->app->singleton(ITaskRepository::class, TaskRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
