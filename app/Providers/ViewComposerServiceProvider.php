<?php namespace App\Providers;

use App\Article;
use App\Menu;

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
        $this->composeBlogs();
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
