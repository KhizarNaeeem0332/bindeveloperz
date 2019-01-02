<?php

namespace Bindeveloperz\Alert ;


use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'alert');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Bindeveloperz\Alert\Contracts\IAlert' , 'Bindeveloperz\Alert\AlertSessionStore');

        $this->app->singleton('alert' , function() {
            return $this->app->make('Bindeveloperz\Alert\Alerter');
        });
    }
}
