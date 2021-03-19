<?php

namespace Printlabel;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PrintlabelServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind('Mdhprintlabel', function () {
            return new \Printlabel\Mdhprintlabel;
        });
    }

    public function boot()
    {
        // Load Views, Migrations and Routes
        $this->loadViewsFrom(__DIR__ . '/../views', 'Printlabel');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutes();

        // Publishes
        $this->setPublishes();
    }

    /**
     * Publishing the files that the user may override.
     *
     * @return void
     */
    protected function setPublishes()
    {
        // Config
        $this->publishes([
            __DIR__ . '/../config/printlabel.php' => config_path('printlabel.php')
        ], 'printlabel-config');

        // Migrations
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'printlabel-migrations');

        // Controllers
        $this->publishes([
            __DIR__ . '/../src/Http/Controllers' => app_path('Http/Controllers/vendor/printlabel')
        ], 'printlabel-controllers');

        // Views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/printlabel')
        ], 'printlabel-views');

        // Assets
        $this->publishes([
            // CSS
            __DIR__ . '/../assets/css' => public_path('css/printlabel'),
            // JavaScript
            __DIR__ . '/../assets/js' => public_path('js/printlabel'),
        ], 'printlabel-assets');
    }
    /**
     * Group the routes and set up configurations to load them.
     *
     * @return void
     */
    protected function loadRoutes()
    {
        Route::group($this->routesConfigurations(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Routes configurations.
     *
     * @return array
     */
    private function routesConfigurations()
    {
        return [
            'prefix' => config('printlabel.path'),
            'namespace' =>  config('printlabel.namespace'),
            'middleware' => ['web', config('printlabel.middleware')],
        ];
    }
}
