<?php

namespace WPKit\Providers;

use Illuminate\Support\ServiceProvider;
use WPKit\Hashing\WpPasswordHasher;
use PasswordHash;

class HashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('hash', function () {
            return new WpPasswordHasher(new PasswordHash( 8, true ));
        });
        
        $this->app->singleton(
	        \Illuminate\Contracts\Hashing\Hasher::class,
	        function () {
	            return new WpPasswordHasher(new PasswordHash( 8, true ));
	        }
        );
        
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['hash'];
    }
}
