<?php namespace Incevio\Cybersource\Providers;

use Illuminate\Support\ServiceProvider;
use Incevio\Cybersource\Services\CybersourcePaymentsService;

class CybersourceServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider
	 *
	 * @return void
	 */
	public function register() {
		$this->publishes([
	        __DIR__.'/../Resources/cybersource_config.php' => config_path('cybersource_config.php'),
	        __DIR__.'/../Resources/testrest.p12' => config_path('testrest.p12'),
	    ], 'cybersource-config-file');
	}

	/**
	 * Bind service to 'CybersourcePaymentsServices' for use with Facade
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->app->bind(CybersourcePaymentsService::class, function () {
        	return new CybersourcePaymentsService;
        });

        $this->app->alias(CybersourcePaymentsService::class, 'cybersource-payments');
	}
}