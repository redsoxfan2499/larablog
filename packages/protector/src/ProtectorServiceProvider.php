<?php

namespace HyperdriveDesigns\Protector;

use Illuminate\Support\ServiceProvider;
use Blade;

class ProtectorServiceProvider extends ServiceProvider
{
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */

    protected $defer = false;

    /**
     * Boot the service provider.
     *
     * @return null
     */

    public function boot()
    {
        // load the views
        $this->loadViewsFrom(__DIR__.'/Views', 'protector');

        $this->publishes([
            __DIR__.'/../migrations' => $this->app->databasePath().'/migrations',
        ], 'migrations');

        $this->publishes([
            __DIR__.'/Views' => base_path('resources/views/protector')
        ], 'views');

        $this->registerBladeDirectives();

    }

    /**
     * Register the service provider.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton('protector', function ($app) {
            $auth = $app->make('Illuminate\Contracts\Auth\Guard');
            return new \HyperdriveDesigns\Protector\Protector($auth);
        });

        // load our routes
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    /**
     * Register the blade directives.
     *
     * @return void
     */

    protected function registerBladeDirectives()
    {
        Blade::directive('can', function ($expression) {
            return "<?php if (\\Protector::can({$expression})): ?>";
        });
        Blade::directive('endcan', function ($expression) {
            return '<?php endif; ?>';
        });

        Blade::directive('role', function ($expression) {
            return "<?php if (\\Protector::isRole({$expression})): ?>";
        });
        Blade::directive('endrole', function ($expression) {
            return '<?php endif; ?>';
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */

    public function provides()
    {
        return ['protector'];
    }
}
