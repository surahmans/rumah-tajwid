<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../../vendor/datatables/datatables/media' => public_path('package/datatable'),
        ], 'public');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
	}

}
