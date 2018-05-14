<?php

namespace nickurt\HostFact;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nickurt\HostFact\HostFact', function ($app) {
            $hostFact = new HostFact($app);
            $hostFact->panel($hostFact->getDefaultPanel());

            return $hostFact;
        });

        $this->app->alias('nickurt\HostFact\HostFact', 'HostFact');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/hostfact.php' => config_path('hostfact.php')
        ], 'config');

        \Auth::provider('hostfact', function ($app, array $config) {
            return new \nickurt\HostFact\Providers\HostFactProvider();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nickurt\HostFact\HostFact', 'HostFact'];
    }
}
