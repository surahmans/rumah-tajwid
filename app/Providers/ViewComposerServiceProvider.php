<?php namespace App\Providers;

use App\Menu;
use App\Submenu;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->composeNavigation();
    }

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

    public function composeNavigation()
    {
        view()->composer('front.partials.nav', function ($view) {
            $menus = Menu::with('submenu')->get();
            $view->with('menus', $menus);
        });
    }

}
