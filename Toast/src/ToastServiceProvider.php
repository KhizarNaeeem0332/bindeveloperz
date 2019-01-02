<?php

namespace Bindeveloperz\Toast;

use Illuminate\Support\ServiceProvider;

class ToastServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/toast.php' , 'toast');
        $this->loadViewsFrom(__DIR__ . '/../views', 'toast');


        $this->publishes([
            __DIR__ . '/../config/toast.php' => config_path(),
            __DIR__. '/../assets' => public_path('vendor/toast'),
        ], 'toast');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->singleton('toast' , function() {
            return $this->app->make('Bindeveloperz\Toast\Toaster');
        });
    }
}
