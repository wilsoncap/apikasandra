<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\UserServiceInterface;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Cuando alguien solicite una instancia de UserServiceInterface, proporciona una instancia de UserService.
        // // Vincula la interfaz con la implementación
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $migrationsPath = database_path('migrations');
        $directories    = glob($migrationsPath.'/*', GLOB_ONLYDIR);
        $paths          = array_merge([$migrationsPath], $directories);

        $this->loadMigrationsFrom($paths);

    }
}
